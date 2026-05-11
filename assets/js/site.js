const $ = (selector, parent = document) => parent.querySelector(selector);
const $$ = (selector, parent = document) => Array.from(parent.querySelectorAll(selector));

document.addEventListener("DOMContentLoaded", () => {
    const body = document.body;
    const header = $("[data-header]");
    const dim = $("[data-page-dim]");
    const mobileMenu = $("[data-mobile-menu]");
    const searchOverlay = $("[data-search-overlay]");
    const quoteDrawer = $("[data-quote-drawer]");
    const megaPanel = $("[data-mega-panel]");
    const megaToggle = $("[data-mega-toggle]");
    const quoteCount = $("[data-quote-count]");
    const quoteItemsContainer = $("[data-quote-items]");
    const quoteField = $("[data-quote-field]");
    const toastStack = $("[data-toast-stack]");

    const state = {
        quote: loadStoredItems("ascQuoteItems"),
        compare: [],
    };

    const applyLayerState = (name, isOpen) => {
        if (name === "menu" && mobileMenu) {
            mobileMenu.classList.toggle("is-open", isOpen);
            body.classList.toggle("has-menu", isOpen);
            syncAccessibilityState(mobileMenu, isOpen);
        }

        if (name === "search" && searchOverlay) {
            searchOverlay.classList.toggle("is-open", isOpen);
            body.classList.toggle("has-search", isOpen);
            syncAccessibilityState(searchOverlay, isOpen);
        }

        if (name === "quote" && quoteDrawer) {
            quoteDrawer.classList.toggle("is-open", isOpen);
            body.classList.toggle("has-quote", isOpen);
            syncAccessibilityState(quoteDrawer, isOpen);
        }

        if (name === "compare") {
            const modal = $("[data-compare-modal]");
            if (modal) {
                modal.classList.toggle("is-open", isOpen);
                modal.hidden = !isOpen;
                body.classList.toggle("has-compare", isOpen);
                syncAccessibilityState(modal, isOpen);
            }
        }

        const anyOpen = ["has-menu", "has-search", "has-quote", "has-compare"].some((className) => body.classList.contains(className));
        if (dim) {
            dim.classList.toggle("is-open", anyOpen);
        }
    };

    const setLayer = (name, isOpen) => {
        if (isOpen) {
            ["menu", "search", "quote", "compare"].forEach((layerName) => {
                if (layerName !== name) {
                    applyLayerState(layerName, false);
                }
            });
        }

        applyLayerState(name, isOpen);
    };

    const closeTransientUi = () => {
        setLayer("menu", false);
        setLayer("search", false);
        setLayer("quote", false);
        setLayer("compare", false);
        if (megaPanel) {
            megaPanel.classList.remove("is-open");
        }
        if (megaToggle) {
            megaToggle.classList.remove("is-open");
        }
    };

    const showToast = (message) => {
        if (!toastStack || !message) return;
        const node = document.createElement("div");
        node.className = "toast";
        node.textContent = message;
        toastStack.appendChild(node);
        window.setTimeout(() => {
            node.remove();
        }, 3600);
    };

    const updateYear = () => {
        $$("[data-year]").forEach((node) => {
            node.textContent = String(new Date().getFullYear());
        });
    };

    const observeReveal = () => {
        const items = $$(".reveal");
        if (!items.length) return;
        const observer = new IntersectionObserver((entries) => {
            entries.forEach((entry) => {
                if (entry.isIntersecting) {
                    entry.target.classList.add("is-visible");
                    observer.unobserve(entry.target);
                }
            });
        }, { threshold: 0.16 });
        items.forEach((item) => observer.observe(item));
    };

    const observeCounters = () => {
        const counters = $$("[data-counter]");
        if (!counters.length) return;

        const animateCounter = (node) => {
            const target = Number(node.dataset.counter || 0);
            const suffix = node.dataset.suffix || "";
            const duration = 1200;
            const start = performance.now();

            const step = (timestamp) => {
                const progress = Math.min((timestamp - start) / duration, 1);
                const eased = 1 - Math.pow(1 - progress, 3);
                const value = Math.round(target * eased);
                node.textContent = `${value.toLocaleString("en-IN")}${suffix}`;
                if (progress < 1) {
                    requestAnimationFrame(step);
                }
            };

            requestAnimationFrame(step);
        };

        const observer = new IntersectionObserver((entries) => {
            entries.forEach((entry) => {
                if (entry.isIntersecting) {
                    animateCounter(entry.target);
                    observer.unobserve(entry.target);
                }
            });
        }, { threshold: 0.4 });

        counters.forEach((node) => observer.observe(node));
    };

    const syncHeader = () => {
        if (!header) return;
        const onScroll = () => {
            header.classList.toggle("is-scrolled", window.scrollY > 16);
        };
        onScroll();
        window.addEventListener("scroll", onScroll, { passive: true });
    };

    const bindHeaderUi = () => {
        $("[data-menu-open]")?.addEventListener("click", () => setLayer("menu", true));
        $("[data-menu-close]")?.addEventListener("click", () => setLayer("menu", false));
        $("[data-search-open]")?.addEventListener("click", () => {
            setLayer("search", true);
            $("[data-global-search]")?.focus();
        });
        $("[data-search-close]")?.addEventListener("click", () => setLayer("search", false));
        $("[data-quote-open]")?.addEventListener("click", () => setLayer("quote", true));
        $("[data-quote-close]")?.addEventListener("click", () => setLayer("quote", false));

        if (megaToggle && megaPanel) {
            megaToggle.addEventListener("click", () => {
                const next = !megaPanel.classList.contains("is-open");
                megaPanel.classList.toggle("is-open", next);
                megaToggle.classList.toggle("is-open", next);
                syncAccessibilityState(megaPanel, next);
            });
        }

        dim?.addEventListener("click", closeTransientUi);

        document.addEventListener("keydown", (event) => {
            if (event.key === "Escape") {
                closeTransientUi();
            }
        });

        document.addEventListener("click", (event) => {
            if (!megaPanel || !megaToggle) return;
            const target = event.target;
            if (!(target instanceof Node)) return;
            if (!megaPanel.contains(target) && !megaToggle.contains(target)) {
                megaPanel.classList.remove("is-open");
                megaToggle.classList.remove("is-open");
                syncAccessibilityState(megaPanel, false);
            }
        });
    };

    const renderQuote = () => {
        if (!quoteItemsContainer || !quoteCount) return;

        quoteCount.textContent = String(state.quote.length);

        if (!state.quote.length) {
            quoteItemsContainer.innerHTML = `
                <div class="empty-state">
                    <h3>Your quote list is empty</h3>
                    <p>Add products from the catalogue to build a multi-item procurement request.</p>
                </div>
            `;
            if (quoteField) quoteField.value = "";
            persistItems("ascQuoteItems", state.quote);
            return;
        }

        quoteItemsContainer.innerHTML = state.quote.map((item, index) => `
            <article class="quote-item">
                <div class="quote-item__top">
                    <div>
                        <strong>${escapeHtml(item.name)}</strong>
                        <div class="quote-item__meta">
                            <span>${escapeHtml(item.brand)}</span>
                            <span>${escapeHtml(item.category)}</span>
                            <span>${escapeHtml(item.availability)}</span>
                        </div>
                    </div>
                    <button class="link-button" type="button" data-remove-quote="${index}">Remove</button>
                </div>
                <label>
                    Quantity / note
                    <input type="text" data-quote-note="${index}" value="${escapeHtml(item.note || "")}" placeholder="Quantity, pack size or delivery note">
                </label>
            </article>
        `).join("");

        if (quoteField) {
            quoteField.value = JSON.stringify(state.quote);
        }

        $$("[data-remove-quote]").forEach((button) => {
            button.addEventListener("click", () => {
                const index = Number(button.dataset.removeQuote);
                state.quote.splice(index, 1);
                renderQuote();
                syncQuoteButtons();
            });
        });

        $$("[data-quote-note]").forEach((input) => {
            input.addEventListener("input", () => {
                const index = Number(input.dataset.quoteNote);
                if (!Number.isNaN(index) && state.quote[index]) {
                    state.quote[index].note = input.value;
                    if (quoteField) quoteField.value = JSON.stringify(state.quote);
                    persistItems("ascQuoteItems", state.quote);
                }
            });
        });

        persistItems("ascQuoteItems", state.quote);
    };

    const syncQuoteButtons = () => {
        $$("[data-add-quote]").forEach((button) => {
            const product = parseDatasetJson(button.dataset.product);
            if (!product) return;
            const exists = state.quote.some((item) => item.slug === product.slug);
            button.textContent = exists ? "Added to Quotation" : "Add to Quotation";
            button.classList.toggle("button--secondary", exists);
            button.classList.toggle("button--primary", !exists);
        });
    };

    const bindQuoteButtons = () => {
        $$("[data-add-quote]").forEach((button) => {
            button.addEventListener("click", () => {
                const product = parseDatasetJson(button.dataset.product);
                if (!product) return;
                if (!state.quote.some((item) => item.slug === product.slug)) {
                    state.quote.push({ ...product, note: "" });
                    renderQuote();
                    syncQuoteButtons();
                    setLayer("quote", true);
                    showToast(`${product.name} added to your RFQ list.`);
                } else {
                    setLayer("quote", true);
                }
            });
        });
    };

    const renderGlobalSearch = () => {
        const input = $("[data-global-search]");
        const resultsNode = $("[data-search-results]");
        if (!input || !resultsNode || !window.siteSearch) return;

        const items = [
            ...(window.siteSearch.products || []).map((item) => ({
                title: item.name,
                meta: `${item.brand} · ${item.category}`,
                href: "/products.php",
                label: "Product",
            })),
            ...(window.siteSearch.categories || []).map((item) => ({
                title: item.name,
                meta: item.summary,
                href: "/products.php",
                label: "Category",
            })),
            ...(window.siteSearch.catalogues || []).map((item) => ({
                title: item.title,
                meta: `${item.category} · ${item.pages} pages`,
                href: "/catalogues.php",
                label: "Catalogue",
            })),
            ...(window.siteSearch.brands || []).map((item) => ({
                title: item,
                meta: "Brand partner",
                href: "/products.php",
                label: "Brand",
            })),
        ];

        const render = (query = "") => {
            const term = query.trim().toLowerCase();
            const matches = (term ? items.filter((item) => (`${item.title} ${item.meta}`.toLowerCase().includes(term))) : items).slice(0, 8);
            resultsNode.innerHTML = matches.length ? matches.map((item) => `
                <a class="search-result" href="${item.href}">
                    <div>
                        <strong>${escapeHtml(item.title)}</strong>
                        <div class="search-result__meta">
                            <span>${escapeHtml(item.label)}</span>
                            <span>${escapeHtml(item.meta)}</span>
                        </div>
                    </div>
                    <span class="link-button">Open</span>
                </a>
            `).join("") : `<div class="empty-state"><h3>No matches yet</h3><p>Try a product name, brand, chemical or category.</p></div>`;
        };

        input.addEventListener("input", () => render(input.value));
        render("");
    };

    const setupAccordions = () => {
        $$("[data-accordion]").forEach((item) => {
            const trigger = $("[data-accordion-trigger]", item);
            const content = $("[data-accordion-content]", item);
            if (!trigger || !content) return;
            trigger.addEventListener("click", () => {
                const isOpen = item.classList.toggle("is-open");
                content.style.maxHeight = isOpen ? `${content.scrollHeight}px` : "0px";
            });
        });
    };

    const filterProducts = () => {
        const cards = $$("[data-product-card]");
        if (!cards.length) return;
        const searchInput = $("[data-product-search]");
        const brandSelect = $("[data-brand-filter]");
        const emptyState = $("[data-empty-state]");

        const stateFilters = {
            category: "all",
            availability: "all",
        };

        const apply = () => {
            const searchTerm = searchInput?.value.trim().toLowerCase() || "";
            const brand = brandSelect?.value || "all";
            let visible = 0;

            cards.forEach((card) => {
                const haystack = `${card.dataset.name} ${card.dataset.brand} ${card.dataset.category} ${card.dataset.availability}`.toLowerCase();
                const categoryMatch = stateFilters.category === "all" || card.dataset.category === stateFilters.category;
                const availabilityMatch = stateFilters.availability === "all" || card.dataset.availability === stateFilters.availability;
                const brandMatch = brand === "all" || card.dataset.brand === brand;
                const searchMatch = !searchTerm || haystack.includes(searchTerm);
                const show = categoryMatch && availabilityMatch && brandMatch && searchMatch;
                card.hidden = !show;
                if (show) visible += 1;
            });

            if (emptyState) {
                emptyState.hidden = visible !== 0;
            }
        };

        $$("[data-filter-category]").forEach((button) => {
            button.addEventListener("click", () => {
                stateFilters.category = button.dataset.filterCategory || "all";
                $$("[data-filter-category]").forEach((node) => node.classList.remove("chip--active"));
                button.classList.add("chip--active");
                apply();
            });
        });

        $$("[data-filter-availability]").forEach((button) => {
            button.addEventListener("click", () => {
                stateFilters.availability = button.dataset.filterAvailability || "all";
                $$("[data-filter-availability]").forEach((node) => node.classList.remove("chip--active"));
                button.classList.add("chip--active");
                apply();
            });
        });

        searchInput?.addEventListener("input", apply);
        brandSelect?.addEventListener("change", apply);
        apply();
    };

    const filterCatalogues = () => {
        const cards = $$("[data-catalogue-card]");
        if (!cards.length) return;
        const searchInput = $("[data-catalogue-search]");
        const emptyState = $("[data-catalogue-empty]");
        let activeCategory = "all";

        const apply = () => {
            const term = searchInput?.value.trim().toLowerCase() || "";
            let visible = 0;
            cards.forEach((card) => {
                const categoryMatch = activeCategory === "all" || card.dataset.category === activeCategory;
                const searchMatch = !term || `${card.dataset.title} ${card.dataset.category}`.toLowerCase().includes(term);
                const show = categoryMatch && searchMatch;
                card.hidden = !show;
                if (show) visible += 1;
            });
            if (emptyState) {
                emptyState.hidden = visible !== 0;
            }
        };

        $$("[data-filter-catalogue]").forEach((button) => {
            button.addEventListener("click", () => {
                activeCategory = button.dataset.filterCatalogue || "all";
                $$("[data-filter-catalogue]").forEach((node) => node.classList.remove("chip--active"));
                button.classList.add("chip--active");
                apply();
            });
        });

        searchInput?.addEventListener("input", apply);
        apply();
    };

    const renderCompare = () => {
        const compareBar = $("[data-compare-bar]");
        const compareCount = $("[data-compare-count]");
        const compareTable = $("[data-compare-table]");
        if (compareBar && compareCount) {
            compareBar.hidden = state.compare.length === 0;
            compareCount.textContent = `${state.compare.length} product${state.compare.length === 1 ? "" : "s"} selected`;
        }

        $$("[data-compare-trigger]").forEach((button) => {
            const product = parseDatasetJson(button.dataset.product);
            if (!product) return;
            const selected = state.compare.some((item) => item.slug === product.slug);
            button.textContent = selected ? "Selected" : "Compare";
        });

        if (!compareTable) return;

        if (!state.compare.length) {
            compareTable.innerHTML = `<div class="empty-state"><h3>No products selected</h3><p>Select up to three items to compare specifications side by side.</p></div>`;
            return;
        }

        const specKeys = Array.from(new Set(state.compare.flatMap((item) => Object.keys(item.specs || {}))));
        compareTable.innerHTML = `
            <table>
                <thead>
                    <tr>
                        <th>Field</th>
                        ${state.compare.map((item) => `<th>${escapeHtml(item.name)}<br><small>${escapeHtml(item.brand)}</small></th>`).join("")}
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Category</td>
                        ${state.compare.map((item) => `<td>${escapeHtml(item.category)}</td>`).join("")}
                    </tr>
                    <tr>
                        <td>Availability</td>
                        ${state.compare.map((item) => `<td>${escapeHtml(item.availability)}</td>`).join("")}
                    </tr>
                    ${specKeys.map((key) => `
                        <tr>
                            <td>${escapeHtml(key)}</td>
                            ${state.compare.map((item) => `<td>${escapeHtml((item.specs || {})[key] || "-")}</td>`).join("")}
                        </tr>
                    `).join("")}
                </tbody>
            </table>
        `;
    };

    const bindCompare = () => {
        $$("[data-compare-trigger]").forEach((button) => {
            button.addEventListener("click", () => {
                const product = parseDatasetJson(button.dataset.product);
                if (!product) return;
                const index = state.compare.findIndex((item) => item.slug === product.slug);
                if (index >= 0) {
                    state.compare.splice(index, 1);
                } else {
                    if (state.compare.length >= 3) {
                        showToast("You can compare up to three products at a time.");
                        return;
                    }
                    state.compare.push(product);
                }
                renderCompare();
            });
        });

        $("[data-compare-open]")?.addEventListener("click", () => setLayer("compare", true));
        $("[data-compare-close]")?.addEventListener("click", () => setLayer("compare", false));
        $("[data-compare-clear]")?.addEventListener("click", () => {
            state.compare = [];
            renderCompare();
        });
    };

    const bindForms = () => {
        $$("[data-inquiry-form]").forEach((form) => {
            form.addEventListener("submit", async (event) => {
                event.preventDefault();
                const status = $("[data-form-status]", form);
                const submitButton = $("button[type='submit']", form);
                const formData = new FormData(form);

                if (quoteField && form.contains(quoteField)) {
                    quoteField.value = JSON.stringify(state.quote);
                    formData.set("quote_items", quoteField.value);
                }

                if (status) status.textContent = "Submitting your inquiry...";
                if (submitButton) submitButton.disabled = true;

                try {
                    const response = await fetch("/submit-inquiry.php", {
                        method: "POST",
                        body: formData,
                    });

                    const payload = await response.json();
                    if (!response.ok || !payload.ok) {
                        throw new Error(payload.message || "Something went wrong.");
                    }

                    form.reset();
                    if (status) status.textContent = payload.message;
                    showToast(payload.message);

                    if (form.contains(quoteField)) {
                        state.quote = [];
                        renderQuote();
                        syncQuoteButtons();
                    }
                } catch (error) {
                    if (status) status.textContent = error.message || "Unable to submit right now.";
                    showToast(error.message || "Unable to submit right now.");
                } finally {
                    if (submitButton) submitButton.disabled = false;
                }
            });
        });
    };

    const bindToastMessages = () => {
        $$("[data-toast-message]").forEach((button) => {
            button.addEventListener("click", () => {
                showToast(button.dataset.toastMessage || "");
            });
        });
    };

    updateYear();
    observeReveal();
    observeCounters();
    syncHeader();
    bindHeaderUi();
    renderGlobalSearch();
    renderQuote();
    bindQuoteButtons();
    syncQuoteButtons();
    setupAccordions();
    filterProducts();
    filterCatalogues();
    bindCompare();
    renderCompare();
    bindForms();
    bindToastMessages();
});

function escapeHtml(value) {
    return String(value)
        .replaceAll("&", "&amp;")
        .replaceAll("<", "&lt;")
        .replaceAll(">", "&gt;")
        .replaceAll('"', "&quot;")
        .replaceAll("'", "&#039;");
}

function loadStoredItems(key) {
    try {
        return JSON.parse(localStorage.getItem(key) || "[]");
    } catch {
        return [];
    }
}

function persistItems(key, value) {
    localStorage.setItem(key, JSON.stringify(value));
}

function parseDatasetJson(value) {
    if (!value) return null;
    try {
        return JSON.parse(value);
    } catch {
        return null;
    }
}

function syncAccessibilityState(node, isOpen) {
    if (!node) return;
    node.setAttribute("aria-hidden", isOpen ? "false" : "true");
    if (isOpen) {
        node.removeAttribute("inert");
    } else {
        node.setAttribute("inert", "");
    }
}

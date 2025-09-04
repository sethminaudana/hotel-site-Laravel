<section class="bd-foodmenu-area p-relative pt-150 pb-150">
    <div class="bd-foodmenu__bg" data-background="{{ asset('img/restaurant/foodmenu.jpg') }}"></div>
    <div class="container">
        <div class="row justify-content-center wow fadeInUp" data-wow-delay=".5s">
            <div class="col-lg-8">
                <div class="bd-section__title-wrapper is-white text-center" id="diningSection">
                    <p class="bd-section__subtitle mb-20">food menus</p>
                    <h2 class="bd-section__title mb-35">Delicious Food Forever</h2>
                </div>
            </div>
        </div>
    </div>

    <div class="bd-foodmenu__tab">
        <div class="container">
            <div class="row wow fadeInUp" data-wow-delay=".5s">
                <div class="col-12">
                    @php
                        function numberToWord($number) {
                            $words = [
                                1 => 'one', 2 => 'two', 3 => 'three', 4 => 'four', 5 => 'five',
                                6 => 'six', 7 => 'seven', 8 => 'eight', 9 => 'nine', 10 => 'ten'
                            ];
                            return $words[$number] ?? $number;
                        }
                    @endphp

                    <ul class="nav nav-tabs mb-65" id="foodmenu-tab" role="tablist">
                        @foreach ($categories as $category)
                            @php $wordId = numberToWord($category->id); @endphp
                            <li class="nav-item" role="presentation">
                                <button class="nav-link category-tab {{ $loop->first ? 'active' : '' }}"
                                    id="foodtab-{{ $wordId }}-tab"
                                    data-bs-toggle="tab"
                                    data-bs-target="#foodtab-{{ $wordId }}"
                                    type="button" role="tab"
                                    aria-controls="foodtab-{{ $wordId }}"
                                    aria-selected="{{ $loop->first ? 'true' : 'false' }}"
                                    data-category-id="{{ $category->id }}"
                                    data-tab-id="foodtab-{{ $wordId }}">
                                    {{ $category->category_name }}
                                </button>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>

        <div class="tab-content wow fadeInUp" data-wow-delay=".5s" id="foodmenu-tabContent">
            @foreach ($categories as $category)
                @php $wordId = numberToWord($category->id); @endphp
                <div class="tab-pane fade {{ $loop->first ? 'show active' : '' }}"
                    id="foodtab-{{ $wordId }}" role="tabpanel"
                    aria-labelledby="foodtab-{{ $wordId }}-tab">
                    <div class="bd-foodmenu">
                        <div class="swiper-container bd-foodmenu-active">
                            <div class="swiper-wrapper">
                                <div class="swiper-slide test">
                                    <div class="bd-foodmenu-grid" id="grid-container-{{ $category->id }}">
                                        {{-- AJAX content will be inserted here --}}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
<script>

      /* Updated JavaScript */
document.addEventListener('DOMContentLoaded', function () {
    const tabs = document.querySelectorAll('.category-tab');

            // Initialize scrollable navigation wrapper
            initializeCategoryNavigation();

            tabs.forEach(tab => {
                tab.addEventListener('click', function () {
                    const categoryId = this.dataset.categoryId;
                    const tabId = this.dataset.tabId;
                    const gridContainer = document.getElementById(`grid-container-${categoryId}`);

                    // Avoid reloading if already loaded
                    if (gridContainer.dataset.loaded === 'true') return;
                    gridContainer.dataset.loaded = 'true';

                    // Clear previous content
                    gridContainer.innerHTML = '<div class="loading-item">Loading...</div>';

                    fetch(`/dining/items/${encodeURIComponent(categoryId)}`)
                        .then(res => res.json())
                        .then(data => {
                            if (!data.foods.length) {
                                gridContainer.innerHTML = '<div class="no-items">No food items found.</div>';
                                return;
                            }

                    let html = '';
                    console.log(data);
                    data.foods.forEach(item => {
                        html += `
                            <div class="bd-foodmenu__item">
                                <div class="bd-foodmenu__item-thumb mb-30">
                                    <a href="/service-details"><img src="${item.image_path}" alt="${item.food_name}"></a>
                                </div>
                                <div class="bd-foodmenu__item-content">
                                    <h3 class="bd-foodmenu__item-title mb-10">
                                        <a href="/service-details">${item.food_name}</a>
                                    </h3>
                                    <p>${item.description}</p>

                                    <div class="bd-foodmenu__item-price mt-35">
                                        <span>Rs. ${item.price ? parseFloat(item.price).toFixed(2) : 'N/A'}</span>
                                    </div>
                                </div>
                            </div>
                        `;
                    });

                            gridContainer.innerHTML = html;
                        })
                        .catch(err => {
                            gridContainer.innerHTML = '<div class="error-item">Error loading items.</div>';
                            console.error(err);
                        });
                });
            });

            // Trigger first tab click on page load
            const firstTab = document.querySelector('.category-tab.active');
            if (firstTab) firstTab.click();

            function initializeCategoryNavigation() {
                const navTabs = document.querySelector('.nav-tabs');
                const parent = navTabs.parentNode;
                const categories = navTabs.querySelectorAll('.category-tab');

                // Only create navigation wrapper if more than 5 categories
                if (categories.length <= 5) {
                    return; // Exit if 5 or fewer categories
                }

        const wrapper = document.createElement('div');
        wrapper.className = 'category-nav-wrapper';

        const navContainer = document.createElement('div');
        navContainer.className = 'category-nav-container';

                const prevBtn = document.createElement('button');
                prevBtn.className = 'category-nav-btn category-nav-prev';
                prevBtn.innerHTML = '<i class="fas fa-chevron-left"></i>';
                prevBtn.style.display = 'none';

                const nextBtn = document.createElement('button');
                nextBtn.className = 'category-nav-btn category-nav-next';
                nextBtn.innerHTML = '<i class="fas fa-chevron-right"></i>';

                wrapper.appendChild(prevBtn);
                wrapper.appendChild(navContainer);
                wrapper.appendChild(nextBtn);

                parent.replaceChild(wrapper, navTabs);
                navContainer.appendChild(navTabs);

        // Add scrollable class and show navigation
        navTabs.classList.add('scrollable');

        // Calculate visible width to show exactly 5 tabs
        const firstTab = categories[0];
        const tabWidth = firstTab.offsetWidth;
        const tabGap = 20; // Gap between tabs
        const visibleWidth = (tabWidth * 5) + (tabGap * 4); // 5 tabs + 4 gaps

        navContainer.style.width = `${visibleWidth}px`;

        let currentIndex = 0;
        const maxVisibleTabs = 5;
        const totalTabs = categories.length;

        // Function to update tab visibility
        function updateTabVisibility() {
            const translateX = -(currentIndex * (tabWidth + tabGap));
            navTabs.style.transform = `translateX(${translateX}px)`;

            // Update button states
            prevBtn.style.display = currentIndex > 0 ? 'block' : 'none';
            nextBtn.style.display = currentIndex < (totalTabs - maxVisibleTabs) ? 'block' : 'none';
        }

                nextBtn.addEventListener('click', () => {
                    if (currentIndex < (totalTabs - maxVisibleTabs)) {
                        currentIndex++;
                        updateTabVisibility();
                    }
                });

                prevBtn.addEventListener('click', () => {
                    if (currentIndex > 0) {
                        currentIndex--;
                        updateTabVisibility();
                    }
                });

                // Initialize visibility
                updateTabVisibility();

                // Handle window resize
                window.addEventListener('resize', () => {
                    // Recalculate on resize if needed
                    updateTabVisibility();
                });
            }
        });
    </script>
</section>

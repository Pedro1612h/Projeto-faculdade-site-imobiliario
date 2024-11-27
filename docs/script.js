document.addEventListener("DOMContentLoaded", () => {
    // Função para encontrar os 3 imóveis mais caros
    function getTopProperties() {
        const propertyCards = document.querySelectorAll(".property-card");
        const properties = Array.from(propertyCards).map((card) => ({
            element: card,
            price: parseInt(card.getAttribute("data-price")),
        }));

        // Ordena os imóveis pelo preço em ordem decrescente e pega os 3 primeiros
        return properties.sort((a, b) => b.price - a.price).slice(0, 3);
    }

    // Cria o carrossel com os 3 imóveis mais caros
    function createCarousel(topProperties) {
        const carouselContainer = document.createElement("div");
        carouselContainer.className = "carousel";

        const carouselWrapper = document.createElement("div");
        carouselWrapper.className = "carousel-wrapper";

        topProperties.forEach((property) => {
            const clonedCard = property.element.cloneNode(true);
            clonedCard.classList.add("carousel-item");
            carouselWrapper.appendChild(clonedCard);
        });

        // Botões de navegação
        const prevButton = document.createElement("button");
        prevButton.className = "carousel-nav prev";
        prevButton.innerText = "←";

        const nextButton = document.createElement("button");
        nextButton.className = "carousel-nav next";
        nextButton.innerText = "→";

        // Adiciona os elementos ao container
        carouselContainer.appendChild(prevButton);
        carouselContainer.appendChild(carouselWrapper);
        carouselContainer.appendChild(nextButton);

        // Adiciona o carrossel ao DOM, antes da lista de imóveis
        const mainContainer = document.querySelector(".property-listing .container");
        mainContainer.prepend(carouselContainer);

        setupCarouselNavigation(carouselWrapper, prevButton, nextButton);
    }

    // Configura a navegação do carrossel
    function setupCarouselNavigation(wrapper, prevButton, nextButton) {
        let scrollAmount = 0;
        const scrollStep = wrapper.firstChild.offsetWidth + 20; // Largura do item + espaçamento

        prevButton.addEventListener("click", () => {
            wrapper.scrollLeft -= scrollStep;
            scrollAmount -= scrollStep;
            updateButtonState();
        });

        nextButton.addEventListener("click", () => {
            wrapper.scrollLeft += scrollStep;
            scrollAmount += scrollStep;
            updateButtonState();
        });

        function updateButtonState() {
            prevButton.disabled = scrollAmount <= 0;
            nextButton.disabled = scrollAmount >= wrapper.scrollWidth - wrapper.clientWidth;
        }

        updateButtonState(); // Atualiza os botões no início
    }

    // Inicializa o carrossel
    const topProperties = getTopProperties();
    if (topProperties.length > 0) {
        createCarousel(topProperties);
    }

    // ------------------------ FILTRO DE IMÓVEIS ------------------------
    const filterSelect = document.getElementById('filter');
    const propertiesContainer = document.getElementById('properties');
    const propertyCards = Array.from(propertiesContainer.getElementsByClassName('property-card'));

    // Função para ordenar os imóveis
    function sortProperties(filterValue) {
        let sortedProperties = [...propertyCards];

        if (filterValue === 'price-asc') {
            // Ordena pelo preço de forma crescente
            sortedProperties.sort((a, b) => {
                const priceA = parseInt(a.getAttribute('data-price'));
                const priceB = parseInt(b.getAttribute('data-price'));
                return priceA - priceB;
            });
        } else if (filterValue === 'price-desc') {
            // Ordena pelo preço de forma decrescente
            sortedProperties.sort((a, b) => {
                const priceA = parseInt(a.getAttribute('data-price'));
                const priceB = parseInt(b.getAttribute('data-price'));
                return priceB - priceA;
            });
        } else if (filterValue === 'launch') {
            // Filtra apenas os imóveis do tipo lançamento
            sortedProperties = sortedProperties.filter(card => card.getAttribute('data-type') === 'launch');
        } else if (filterValue === 'ready') {
            // Filtra apenas os imóveis do tipo pronto
            sortedProperties = sortedProperties.filter(card => card.getAttribute('data-type') === 'ready');
        }

        // Reorganiza os imóveis na tela
        propertiesContainer.innerHTML = '';
        sortedProperties.forEach(property => {
            propertiesContainer.appendChild(property);
        });
    }

    // Evento para quando o filtro for alterado
    filterSelect.addEventListener('change', function () {
        const selectedFilter = filterSelect.value;
        sortProperties(selectedFilter);
    });
});

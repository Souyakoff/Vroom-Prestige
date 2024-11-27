document.addEventListener('DOMContentLoaded', function() {
    console.log('DOM Content Loaded');
    // Load featured cars
    loadFeaturedCars();
    
    // Load brands and types for search form
    loadBrandsAndTypes();
});

async function loadFeaturedCars() {
    try {
        console.log('Fetching featured cars...');
        const response = await fetch('api/featured-cars.php');
        if (!response.ok) {
            throw new Error(`HTTP error! status: ${response.status}`);
        }
        const cars = await response.json();
        console.log('Featured cars loaded:', cars);
        
        const featuredCarsContainer = document.getElementById('featured-cars');
        if (!featuredCarsContainer) {
            console.error('Featured cars container not found!');
            return;
        }
        
        featuredCarsContainer.innerHTML = cars.map(car => `
            <div class="bg-white rounded-lg shadow-md overflow-hidden">
                <img src="${car.Photo || 'assets/images/car-placeholder.jpg'}" 
                     alt="${car.Modele}" 
                     class="w-full h-48 object-cover">
                <div class="p-4">
                    <h3 class="text-lg font-semibold text-gray-900">${car.NomMarque} ${car.Modele}</h3>
                    <p class="text-gray-600">${car.Annee} - ${car.Energie}</p>
                    <div class="mt-2 flex items-center justify-between">
                        <span class="text-blue-600 font-semibold">${car.PrixLocation}€/jour</span>
                        <a href="reserver.html?id=${car.IdVoiture}" 
                           class="bg-blue-600 text-white px-4 py-2 rounded-md text-sm hover:bg-blue-700">
                            Réserver
                        </a>
                    </div>
                </div>
            </div>
        `).join('');
    } catch (error) {
        console.error('Error loading featured cars:', error);
    }
}

async function loadBrandsAndTypes() {
    try {
        console.log('Fetching brands and types...');
        const [brandsResponse, typesResponse] = await Promise.all([
            fetch('api/brands.php'),
            fetch('api/types.php')
        ]);

        if (!brandsResponse.ok) {
            throw new Error(`HTTP error! status: ${brandsResponse.status}`);
        }
        if (!typesResponse.ok) {
            throw new Error(`HTTP error! status: ${typesResponse.status}`);
        }

        const brands = await brandsResponse.json();
        const types = await typesResponse.json();
        
        console.log('Brands loaded:', brands);
        console.log('Types loaded:', types);
        
        const brandSelect = document.querySelector('select[name="marque"]');
        const typeSelect = document.querySelector('select[name="type"]');
        
        if (!brandSelect) {
            console.error('Brand select element not found!');
            return;
        }
        if (!typeSelect) {
            console.error('Type select element not found!');
            return;
        }

        // Clear existing options except the first one
        brandSelect.innerHTML = '<option value="">Toutes les marques</option>';
        typeSelect.innerHTML = '<option value="">Tous les types</option>';
        
        brands.forEach(brand => {
            const option = document.createElement('option');
            option.value = brand.IdMarque;
            option.textContent = brand.NomMarque;
            brandSelect.appendChild(option);
        });
        
        types.forEach(type => {
            const option = document.createElement('option');
            option.value = type.IdType;
            option.textContent = type.NomType;
            typeSelect.appendChild(option);
        });
    } catch (error) {
        console.error('Error loading brands and types:', error);
    }
}

// Handle search form submission
const searchForm = document.querySelector('form');
if (searchForm) {
    searchForm.addEventListener('submit', function(e) {
        e.preventDefault();
        const formData = new FormData(this);
        const searchParams = new URLSearchParams();
        
        for (const [key, value] of formData.entries()) {
            if (value) searchParams.append(key, value);
        }
        
        window.location.href = `search.html?${searchParams.toString()}`;
    });
} else {
    console.error('Search form not found!');
} 
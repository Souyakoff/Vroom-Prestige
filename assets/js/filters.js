// Global variables to store filter states
let currentBrandId = null;
let currentTypeId = null;

// Initialize filters when the page loads
document.addEventListener('DOMContentLoaded', function() {
    initializeFilters();
    setupFilterListeners();
});

// Initialize filters
async function initializeFilters() {
    try {
        const response = await fetch('api/get-related-filters.php');
        const data = await response.json();
        
        if (data.success) {
            updateBrandSelect(data.brands);
            updateTypeSelect(data.types);
        }
    } catch (error) {
        console.error('Error initializing filters:', error);
    }
}

// Set up event listeners for filter changes
function setupFilterListeners() {
    const brandSelect = document.getElementById('brand-select');
    const typeSelect = document.getElementById('type-select');

    brandSelect.addEventListener('change', async function(e) {
        currentBrandId = e.target.value;
        if (currentBrandId) {
            // Clear type selection when brand changes
            typeSelect.value = '';
            currentTypeId = null;
            
            // Get related types for selected brand
            try {
                const response = await fetch(`api/get-related-filters.php?brand=${currentBrandId}`);
                const data = await response.json();
                
                if (data.success) {
                    updateTypeSelect(data.types);
                }
            } catch (error) {
                console.error('Error updating types:', error);
            }
        } else {
            // If no brand selected, reset everything
            resetFilters();
        }
        
        // Trigger search with new filters
        if (typeof performSearch === 'function') {
            performSearch();
        }
    });

    typeSelect.addEventListener('change', async function(e) {
        currentTypeId = e.target.value;
        if (currentTypeId) {
            // Clear brand selection when type changes
            brandSelect.value = '';
            currentBrandId = null;
            
            // Get related brands for selected type
            try {
                const response = await fetch(`api/get-related-filters.php?type=${currentTypeId}`);
                const data = await response.json();
                
                if (data.success) {
                    updateBrandSelect(data.brands);
                }
            } catch (error) {
                console.error('Error updating brands:', error);
            }
        } else {
            // If no type selected, reset everything
            resetFilters();
        }
        
        // Trigger search with new filters
        if (typeof performSearch === 'function') {
            performSearch();
        }
    });
}

// Update brand select options
function updateBrandSelect(brands) {
    const brandSelect = document.getElementById('brand-select');
    const currentValue = brandSelect.value;
    
    // Clear all options except the first one
    brandSelect.innerHTML = '<option value="">All Brands</option>';
    
    // Add new options
    brands.forEach(brand => {
        const option = document.createElement('option');
        option.value = brand.IdMarque;
        option.textContent = brand.NomMarque;
        brandSelect.appendChild(option);
    });
    
    // Restore previous selection if it exists in new options
    if (currentValue && brands.some(b => b.IdMarque === currentValue)) {
        brandSelect.value = currentValue;
    }
}

// Update type select options
function updateTypeSelect(types) {
    const typeSelect = document.getElementById('type-select');
    const currentValue = typeSelect.value;
    
    // Clear all options except the first one
    typeSelect.innerHTML = '<option value="">All Types</option>';
    
    // Add new options
    types.forEach(type => {
        const option = document.createElement('option');
        option.value = type.IdType;
        option.textContent = type.NomType;
        typeSelect.appendChild(option);
    });
    
    // Restore previous selection if it exists in new options
    if (currentValue && types.some(t => t.IdType === currentValue)) {
        typeSelect.value = currentValue;
    }
}

// Reset all filters to initial state
async function resetFilters() {
    currentBrandId = null;
    currentTypeId = null;
    await initializeFilters();
}

// Get current filter values
function getFilterValues() {
    return {
        brand: currentBrandId,
        type: currentTypeId
    };
} 
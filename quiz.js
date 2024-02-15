function results_show() {
    event.preventDefault();

    // Get the selected values from radio buttons
    var selectedType = document.querySelector('input[name="type"]:checked');
    var selectedColor = document.querySelector('input[name="color"]:checked');
    var selectedStyle = document.querySelector('input[name="style"]:checked');

    // Check if a choice is not selected
    if (!selectedType || !selectedColor || !selectedStyle) {
        // Handle the case where a choice is not selected
        console.error('Please select all preferences');
        return;
    }

    // Get the values
    selectedType = selectedType.value;
    selectedColor = selectedColor.value;
    selectedStyle = selectedStyle.value;

    // Output container
    var outputContainer = document.querySelector(".results");

    // Clear previous results
    outputContainer.innerHTML = '<h2>This looks like your style:</h2>';

    // Create and display images based on user choices
    var imageElement = document.createElement('img');

    imageElement.width = 300; 
    imageElement.height = 400; 
    imageElement.style.padding = '20px';


    // Check type preference
    if (selectedType === 'chunky') {
        imageElement.src = 'img_index/chunky.jpeg';
    } else if (selectedType === 'light') {
        imageElement.src = 'img_index/light.jpeg';
    }

    // Append image to the output container
    outputContainer.appendChild(imageElement);

    // Repeat the process for other choices (color and style)
    var colorImageElement = document.createElement('img');

    colorImageElement.width = 300; // Set the width as per your requirement
    colorImageElement.height = 400; // Set the height as per your requirement
    colorImageElement.style.padding = '20px';

    if (selectedColor === 'silver') {
        colorImageElement.src = 'img_index/silver.jpeg';
    } else if (selectedColor === 'gold') {
        colorImageElement.src = 'img_index/gold.jpeg';
    }
    outputContainer.appendChild(colorImageElement);

    var styleImageElement = document.createElement('img');

    styleImageElement.width = 300; 
    styleImageElement.height = 400;
    styleImageElement.style.padding = '20px';

    if (selectedStyle === 'basic') {
        styleImageElement.src = 'img_index/basic.jpeg';
    } else if (selectedStyle === 'statement') {
        styleImageElement.src = 'img_index/statement.jpeg';
    }
    outputContainer.appendChild(styleImageElement);
}

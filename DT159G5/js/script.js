/*This is the main script file for the project.*/
function fetchDataAndUpdatePlot() {
    fetch('data.php')
        .then(response => response.json())
        .then(data => {
            // Use the data to update the plot
            updatePlot(data); 
        })
        .catch(error => console.error('Error:', error));
}

// Function to uppdate the plot
function updatePlot(data) {
    var layout = {
        title: 'Statistik Diagram',
        showlegend: true
    };

    Plotly.newPlot('graf', data, layout);
}


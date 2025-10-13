/**
 * Daily Sales Chart Initialization
 * Displays total sales for each day over the past week
 * 
 * Note: This function is called from chart-init.js to ensure proper timing
 * and container dimensions before rendering
 */
// Removed direct DOMContentLoaded listener to prevent duplicate initialization

function initializeDailySalesChart() {
    // Check if the container exists and dashboardData is defined
    const chartContainer = document.getElementById('dailySalesChart');
    if (!chartContainer || typeof dashboardData === 'undefined') {
        console.warn('Daily sales chart container or data not found');
        return;
    }

    // Get daily sales data from the dashboardData object
    const dailySalesData = dashboardData.dailySalesData || [];
    
    // If no data is available, display a message
    if (!dailySalesData.length) {
        chartContainer.innerHTML = '<div class="text-center text-muted py-4">No sales data available</div>';
        return;
    }

    // Format data for the chart
    const categories = dailySalesData.map(item => item.date);
    const salesAmounts = dailySalesData.map(item => parseFloat(item.amount));
    
    // Chart configuration
    const options = {
        series: [{
            name: 'Daily Sales',
            data: salesAmounts
        }],
        chart: {
            height: 300,
            width: 200,
            type: 'bar',
            toolbar: {
                show: false
            },
            sparkline: {
                enabled: false
            }
        },
        plotOptions: {
            bar: {
                borderRadius: 4,
                columnWidth: '60%',
                distributed: true
            }
        },
        colors: ['#3b76ef', '#4caf50', '#ffc107', '#f44336', '#9c27b0', '#00bcd4', '#ff5722'],
        dataLabels: {
            enabled: false
        },
        legend: {
            show: true
        },
        grid: {
            borderColor: '#e0e0e0',
            strokeDashArray: 4,
            xaxis: {
                lines: {
                    show: false
                }
            }
        },
        xaxis: {
            categories: categories,
            labels: {
                style: {
                    fontSize: '10px'
                }
            }
        },
        yaxis: {
            labels: {
                formatter: function (val) {
                    return 'RM' + val.toFixed(0);
                }
            }
        },
        tooltip: {
            y: {
                formatter: function(val) {
                    return 'RM' + val.toFixed(2);
                }
            }
        }
    };

    // Create and render the chart
    const chart = new ApexCharts(chartContainer, options);
    chart.render();
}
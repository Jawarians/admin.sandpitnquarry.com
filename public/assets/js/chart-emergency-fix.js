/**
 * Emergency chart fix for barChart and dailySalesChart
 * This directly initializes these two problematic charts with a delayed approach
 */

// Wait for jQuery and ApexCharts to be fully loaded
(function() {
    // Check for jQuery and ApexCharts at regular intervals
    const checkInterval = setInterval(function() {
        if (typeof jQuery !== 'undefined' && typeof ApexCharts !== 'undefined' && typeof dashboardData !== 'undefined') {
            clearInterval(checkInterval);
            console.log('Libraries loaded, initializing problematic charts');
            
            // Allow layout to settle before initializing charts
            setTimeout(initProblematicCharts, 200);
            
            // Additional safety initialization for cases where first attempt fails
            setTimeout(initProblematicCharts, 1000);
        }
    }, 50);
    
    // Ensure initialization happens eventually even if other checks fail
    setTimeout(function() {
        if (typeof ApexCharts !== 'undefined' && typeof dashboardData !== 'undefined') {
            console.log('Emergency timeout initialization');
            initProblematicCharts();
        }
    }, 2000);
})();

function initProblematicCharts() {
    initializeJobStatusChart();
    initializeDailySalesChart();
    
    // Also try to add a resize trigger to force recalculation
    if (typeof jQuery !== 'undefined') {
        jQuery(window).trigger('resize');
    } else if (typeof window.dispatchEvent === 'function') {
        window.dispatchEvent(new Event('resize'));
    }
}

// Direct initialization of Job Status chart
function initializeJobStatusChart() {
    const barChartElement = document.getElementById('barChart');
    if (!barChartElement || typeof ApexCharts === 'undefined') {
        console.warn('Cannot initialize Job Status chart - missing element or ApexCharts');
        return;
    }
    
    try {
        // Force explicit dimensions before chart initialization
        barChartElement.style.minHeight = '250px';
        barChartElement.style.width = '100%';
        
        // Prepare demo data if real data isn't available
        let jobData;
        if (typeof dashboardData !== 'undefined' && dashboardData.jobsByTypeData) {
            jobData = dashboardData.jobsByTypeData;
        } else {
            // Fallback data
            jobData = {
                'Sun': 3, 
                'Mon': 2, 
                'Tue': 4, 
                'Wed': 5, 
                'Thu': 3, 
                'Fri': 4, 
                'Sat': 2
            };
        }
        
        // Check if existing chart instance
        if (barChartElement.__chartInstance) {
            console.log('Destroying existing Job Status chart instance');
            barChartElement.__chartInstance.destroy();
        }
        
        // Create simple bar chart with minimal options
        const categories = Object.keys(jobData);
        const values = Object.values(jobData);
        
        const options = {
            series: [{
                name: 'Job Count',
                data: values
            }],
            chart: {
                type: 'bar',
                height: 230,
                toolbar: {
                    show: false
                },
                animations: {
                    enabled: false // Disable animations for first render
                }
            },
            plotOptions: {
                bar: {
                    horizontal: false,
                    columnWidth: '55%',
                    borderRadius: 2
                },
            },
            dataLabels: {
                enabled: false
            },
            xaxis: {
                categories: categories
            },
            colors: ['#6259ca']
        };

        // Create and render the chart
        const jobChart = new ApexCharts(barChartElement, options);
        barChartElement.__chartInstance = jobChart; // Save reference
        jobChart.render();
        
        // Re-enable animations after initial render
        setTimeout(() => {
            jobChart.updateOptions({
                chart: {
                    animations: {
                        enabled: true
                    }
                }
            });
        }, 500);
        
        console.log('Job Status chart initialized successfully');
    } catch (error) {
        console.error('Error initializing Job Status chart:', error);
    }
}

// Direct initialization of Daily Sales chart
function initializeDailySalesChart() {
    const salesChartElement = document.getElementById('dailySalesChart');
    if (!salesChartElement || typeof ApexCharts === 'undefined') {
        console.warn('Cannot initialize Daily Sales chart - missing element or ApexCharts');
        return;
    }
    
    try {
        // Force explicit dimensions
        salesChartElement.style.minHeight = '200px';
        salesChartElement.style.width = '100%';
        
        // Prepare data
        let salesData;
        if (typeof dashboardData !== 'undefined' && dashboardData.dailySalesData && 
            Array.isArray(dashboardData.dailySalesData) && dashboardData.dailySalesData.length > 0) {
            salesData = dashboardData.dailySalesData;
        } else {
            // Fallback data
            salesData = [
                { date: '29 Sep', amount: 200 },
                { date: '30 Sep', amount: 300 },
                { date: '01 Oct', amount: 250 },
                { date: '02 Oct', amount: 400 }
            ];
        }
        
        // Check if existing chart instance
        if (salesChartElement.__chartInstance) {
            console.log('Destroying existing Daily Sales chart instance');
            salesChartElement.__chartInstance.destroy();
        }
        
        // Format data for the chart
        const categories = salesData.map(item => item.date);
        const salesAmounts = salesData.map(item => parseFloat(item.amount));
        
        // Chart configuration - simplified for reliable rendering
        const options = {
            series: [{
                name: 'Daily Sales',
                data: salesAmounts
            }],
            chart: {
                height: 200,
                type: 'bar',
                toolbar: {
                    show: false
                },
                animations: {
                    enabled: false // Disable animations for first render
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
                show: false
            },
            xaxis: {
                categories: categories
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
        const salesChart = new ApexCharts(salesChartElement, options);
        salesChartElement.__chartInstance = salesChart; // Save reference
        salesChart.render();
        
        // Re-enable animations after initial render
        setTimeout(() => {
            salesChart.updateOptions({
                chart: {
                    animations: {
                        enabled: true
                    }
                }
            });
        }, 500);
        
        console.log('Daily Sales chart initialized successfully');
    } catch (error) {
        console.error('Error initializing Daily Sales chart:', error);
    }
}
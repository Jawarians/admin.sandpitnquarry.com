/**
 * Dashboard Charts JavaScript
 * This file contains all the chart initialization logic
 */

// Global variables for chart data
let globalDailyOrderData = [];
let globalMonthlyOrderData = [];
let orderTrackingChart = null;

// Debug logging function
function logChartDebug(message, data) {
    console.log(`[Chart Debug] ${message}`, data);
    // Add to page if debug element exists
    const debugElement = document.getElementById('orderDataDebug');
    if (debugElement) {
        const currentContent = debugElement.textContent;
        debugElement.textContent = `${message}\n${JSON.stringify(data, null, 2)}\n\n${currentContent}`;
    }
}

// Function to initialize the Order Revenue chart
function initializeOrderRevenueChart(monthlyData) {
    logChartDebug('Initializing Order Revenue Chart');
    
    // Check for valid data
    if (!monthlyData || !monthlyData.length) {
        console.error('No valid data for Order Revenue chart');
        return;
    }
    
    // Check if chart container exists
    const chartContainer = document.querySelector('#orderRevenueChart');
    if (!chartContainer) {
        console.error('Order Revenue chart container not found');
        return;
    }
    
    // Extract data for chart
    const months = monthlyData.map(item => item.month);
    const revenue = monthlyData.map(item => item.revenue);
    
    // Configure chart
    const options = {
        series: [{
            name: 'Revenue',
            data: revenue
        }],
        chart: {
            height: 350,
            type: 'area',
            toolbar: {
                show: false
            }
        },
        dataLabels: {
            enabled: false
        },
        stroke: {
            curve: 'smooth',
            width: 2
        },
        colors: ['#6259ca'],
        fill: {
            type: 'gradient',
            gradient: {
                shadeIntensity: 1,
                opacityFrom: 0.7,
                opacityTo: 0.3,
                stops: [0, 90, 100]
            }
        },
        xaxis: {
            categories: months
        },
        tooltip: {
            x: {
                format: 'dd/MM/yy HH:mm'
            },
            y: {
                formatter: function (value) {
                    return 'RM ' + value.toFixed(2);
                }
            }
        }
    };

    // Render chart
    try {
        const chart = new ApexCharts(chartContainer, options);
        chart.render();
        logChartDebug('Order Revenue Chart rendered successfully');
    } catch (error) {
        console.error('Error rendering Order Revenue chart:', error);
    }
}

// Function to initialize the Job Status chart
function initializeJobStatusChart(jobData) {
    console.log("Job Status Chart Data:", jobData);
    
    try {
        // Check data structure to determine which chart type to render
        const isTimeSeriesData = typeof Object.values(jobData)[0] === 'object';
        
        if (isTimeSeriesData) {
            // Data is by day, format: { "Day 1": {Pending: 5, Completed: 10}, "Day 2": {...} }
            renderJobStatusByDayChart(jobData);
        } else {
            // Simple status counts, format: {Pending: 10, Completed: 20}
            renderSimpleJobStatusChart(jobData);
        }
    } catch (error) {
        console.error("Error initializing job status chart:", error);
        // Fallback to simple chart with empty data
        renderSimpleJobStatusChart({
            'Pending': 0,
            'Assigned': 0,
            'Completed': 0
        });
    }
    
    // Function to render a stacked bar chart showing job status by day
    function renderJobStatusByDayChart(jobDataByDay) {
        // Get all dates (chart categories)
        const dates = Object.keys(jobDataByDay);
        
        // Get all unique statuses across all days
        const allStatuses = new Set();
        dates.forEach(date => {
            Object.keys(jobDataByDay[date]).forEach(status => {
                allStatuses.add(status);
            });
        });
        const statuses = Array.from(allStatuses);
        
        // Prepare series data - one series per status
        const series = statuses.map(status => {
            return {
                name: status,
                data: dates.map(date => {
                    return jobDataByDay[date][status] || 0;
                })
            };
        });
        
        const jobOptions = {
            series: series,
            chart: {
                type: 'bar',
                height: 250,               // changed from 230 -> use same as container
                offsetY: 0,                // ensure no vertical offset
                stacked: true,
                toolbar: {
                    show: false
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
                categories: dates,
                axisBorder: { show: false },   // hide axis border line
                axisTicks: { show: false }
            },
            yaxis: {
                title: {
                    text: 'Job Count'
                }
            },
            grid: {
                padding: {
                    bottom: 0,
                    top: 0,
                    left: 0,
                    right: 0
                }
            },
            legend: {
                position: 'top',
                horizontalAlign: 'right'
            },
            tooltip: {
                y: {
                    formatter: function(val) {
                        return val + " jobs";
                    }
                }
            },
            fill: {
                opacity: 1
            },
            colors: ['#6259ca', '#17a2b8', '#f7b731', '#00b21e', '#f3f3f3', '#ed5e68']
        };

        const jobChart = new ApexCharts(document.querySelector("#barChart"), jobOptions);
        jobChart.render();
    }
    
    // // Function to render a simple bar chart showing job counts by status
    // function renderSimpleJobStatusChart(simpleJobData) {
    //     const categories = Object.keys(simpleJobData);
    //     const values = Object.values(simpleJobData);
        
    //     const jobOptions = {
    //         series: [{
    //             name: 'Job Count',
    //             data: values
    //         }],
    //         chart: {
    //             type: 'bar',
    //             height: 250,               // changed from 230
    //             offsetY: 0,
    //             toolbar: {
    //                 show: false
    //             }
    //         },
    //         plotOptions: {
    //             bar: {
    //                 horizontal: false,
    //                 columnWidth: '55%',
    //                 borderRadius: 2
    //             },
    //         },
    //         dataLabels: {
    //             enabled: false
    //         },
    //         xaxis: {
    //             categories: categories,
    //             axisBorder: { show: false },
    //             axisTicks: { show: false }
    //         },
    //         grid: {
    //             padding: {
    //                 bottom: 0,
    //                 top: 0,
    //                 left: 0,
    //                 right: 0
    //             }
    //         },
    //         colors: ['#6259ca']
    //     };

    //     const jobChart = new ApexCharts(document.querySelector("#barChart"), jobOptions);
    //     jobChart.render();
    // }
}

// Function to initialize the Trip Overview chart
function initializeTripOverviewChart(completedTrips, cancelledTrips, totalTrips) {
    const inProgressTrips = totalTrips - completedTrips - cancelledTrips;
    
    const tripOptions = {
        series: [completedTrips, cancelledTrips, inProgressTrips],
        chart: {
            type: 'donut',
            height: 250,
        },
        labels: ['Completed', 'Cancelled', 'In Progress'],
        colors: ['#6259ca', '#f7b731', '#17a2b8'],
        legend: {
            show: false
        },
        responsive: [{
            breakpoint: 480,
            options: {
                chart: {
                    width: 200
                },
                legend: {
                    position: 'bottom'
                }
            }
        }]
    };

    const tripChart = new ApexCharts(document.querySelector("#tripOverviewDonutChart"), tripOptions);
    tripChart.render();
}

// Function to initialize the World Map
function initializeWorldMap(mapLocations) {
    const mapMarkers = mapLocations.map(location => {
        return {
            name: location.city,
            coords: [0, 0], // Placeholder coordinates
            style: { fill: '#6259ca' }
        };
    });
    
    const map = new jsVectorMap({
        selector: '#world-map',
        map: 'world',
        zoomButtons: false,
        regionStyle: {
            initial: {
                fill: '#e5e9f2',
                stroke: '#6259ca',
                strokeWidth: 1,
            },
            hover: {
                fill: '#6259ca',
            },
        },
        markers: mapMarkers
    });
}

// Function to initialize the Monthly Trips & Products chart
function initializeTripProductChart(tripData, productCategoryData) {
    // Display chart initialization status in the UI
    const updateChartStatus = function(message, isError = false) {
        console.log("Chart Status:", message);
        const chartElement = document.querySelector("#tripProductChart");
        if (chartElement) {
            chartElement.innerHTML = `<div style="width:100%;text-align:center;padding:20px;background:${isError ? '#fff0f0' : '#f8f8f8'};color:${isError ? '#d32f2f' : '#333'};border:1px solid ${isError ? '#ffd0d0' : '#ddd'};">${message}</div>`;
        }
        
        // Also log to a hidden element on the page for debugging
        const statusElement = document.createElement('div');
        statusElement.style.display = 'none';
        statusElement.className = 'chart-debug-log';
        statusElement.textContent = new Date().toISOString() + ': ' + message;
        document.body.appendChild(statusElement);
    };
    
    updateChartStatus("Initializing Monthly Trips & Products chart...");
    console.log("initializeTripProductChart called with:", { tripData, productCategoryData });
    
    // Check if ApexCharts is available
    if (typeof ApexCharts === 'undefined') {
        updateChartStatus("ERROR: ApexCharts library not available. Please check if the script is loaded correctly.", true);
        return;
    }
    
    // Check if chart container exists
    const chartElement = document.querySelector("#tripProductChart");
    if (!chartElement) {
        updateChartStatus("ERROR: Chart container #tripProductChart not found in the DOM.", true);
        return;
    }
    
    // Get container dimensions for debugging
    const containerWidth = chartElement.offsetWidth;
    const containerHeight = chartElement.offsetHeight;
    console.log(`Chart container dimensions: ${containerWidth}x${containerHeight}`);
    
    if (containerWidth === 0 || containerHeight === 0) {
        updateChartStatus("WARNING: Chart container has zero width or height. Chart may not render correctly.", true);
    }
    
    // Check if we have valid data
    if (!tripData || !tripData.length || !productCategoryData) {
        console.error("Missing or invalid data for Monthly Trips & Products chart");
        updateChartStatus("Using default data (original data was invalid or empty)");
        
        // Create default data to render chart anyway
        tripData = [
            { month: 'Jan', completed: 10, cancelled: 5 },
            { month: 'Feb', completed: 15, cancelled: 7 },
            { month: 'Mar', completed: 20, cancelled: 8 },
            { month: 'Apr', completed: 18, cancelled: 6 }
        ];
        productCategoryData = [12, 18, 22, 20];
        console.log("Using default data for chart");
    }
    
    try {
        // Data preparation with detailed error handling
        let months = [];
        
        try {
            months = tripData.map(item => item.month || '');
            if (months.some(m => !m)) {
                throw new Error("Some month values are empty");
            }
        } catch (error) {
            console.error("Error extracting months:", error);
            months = ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun'];
            updateChartStatus("Error parsing month data, using defaults", true);
        }
        
        // Extract trip data with careful handling of potentially missing keys
        let completedTrips = [];
        try {
            completedTrips = tripData.map(item => {
                // Look for 'completed' in case-insensitive way or any key containing 'complet'
                const completedKey = Object.keys(item).find(
                    key => key.toLowerCase() === 'completed' || 
                          key.toLowerCase().includes('complet')
                );
                return completedKey ? item[completedKey] : 0;
            });
        } catch (error) {
            console.error("Error extracting completed trips:", error);
            completedTrips = [10, 15, 20, 18, 22, 25];
        }
        
        let cancelledTrips = [];
        try {
            cancelledTrips = tripData.map(item => {
                // Look for 'cancelled' in case-insensitive way or any key containing 'cancel'
                const cancelledKey = Object.keys(item).find(
                    key => key.toLowerCase() === 'cancelled' || 
                          key.toLowerCase().includes('cancel')
                );
                return cancelledKey ? item[cancelledKey] : 0;
            });
        } catch (error) {
            console.error("Error extracting cancelled trips:", error);
            cancelledTrips = [5, 7, 8, 6, 9, 10];
        }
        
        // For debugging - log the actual data structure to console
        console.log("Trip Data:", tripData);
        console.log("Product Data:", productCategoryData);
        console.log("Extracted Months:", months);
        console.log("Completed Trips:", completedTrips);
        console.log("Cancelled Trips:", cancelledTrips);
        
        // Product data - convert object to array if needed
        let productCounts = [];
        try {
            if (Array.isArray(productCategoryData)) {
                productCounts = productCategoryData.slice(0, months.length);
            } else if (typeof productCategoryData === 'object') {
                productCounts = Object.values(productCategoryData).slice(0, months.length);
            } else {
                // Handle unexpected data type
                productCounts = [12, 18, 22, 20, 25, 30].slice(0, months.length);
            }
            
            // Ensure product counts match months length by padding or trimming
            while (productCounts.length < months.length) {
                productCounts.push(0);
            }
        } catch (error) {
            console.error("Error processing product data:", error);
            productCounts = [12, 18, 22, 20, 25, 30].slice(0, months.length);
        }
        
        console.log("Final data for chart:", { months, completedTrips, cancelledTrips, productCounts });
        
        // Chart configuration
        const combinedOptions = {
            series: [{
                name: 'Completed Trips',
                type: 'column',
                data: completedTrips
            }, {
                name: 'Cancelled Trips',
                type: 'column',
                data: cancelledTrips
            }, {
                name: 'Products',
                type: 'line',
                data: productCounts
            }],
            chart: {
                height: 350,
                type: 'line',
                toolbar: {
                    show: true  // Enable toolbar for debugging
                },
                animations: {
                    enabled: true
                },
                stacked: false,
                events: {
                    mounted: function(chartContext, config) {
                        console.log("Chart mounted event triggered");
                        updateChartStatus("Chart mounted successfully");
                    },
                    updated: function(chartContext, config) {
                        console.log("Chart updated event triggered");
                    },
                    beforeMount: function(chartContext, config) {
                        console.log("Chart beforeMount event triggered");
                    },
                    animationEnd: function(chartContext, config) {
                        console.log("Chart animation completed");
                    }
                }
            },
            plotOptions: {
                bar: {
                    columnWidth: '50%'
                }
            },
            stroke: {
                width: [0, 0, 3],
                curve: 'smooth'
            },
            colors: ['#6259ca', '#dc3545', '#17a2b8'],
            fill: {
                opacity: [0.85, 0.85, 1],
                gradient: {
                    inverseColors: false,
                    shade: 'light',
                    type: "vertical",
                    opacityFrom: 0.85,
                    opacityTo: 0.55,
                    stops: [0, 100, 100, 100]
                }
            },
            markers: {
                size: 0
            },
            xaxis: {
                categories: months
            },
            yaxis: [
                {
                    title: {
                        text: 'Trips',
                    },
                    seriesName: 'Trips'
                }, 
                {
                    opposite: true,
                    title: {
                        text: 'Products'
                    },
                    seriesName: 'Products'
                }
            ],
            tooltip: {
                shared: true,
                intersect: false,
                y: {
                    formatter: function(val) {
                        return val;
                    }
                }
            },
            legend: {
                position: 'top'
            }
        };
        
        console.log("Creating chart with options:", combinedOptions);
        updateChartStatus("Creating chart instance...");
        
        // Clear any existing chart
        if (window.tripProductChart) {
            try {
                window.tripProductChart.destroy();
                console.log("Destroyed existing chart instance");
            } catch (e) {
                console.error("Error destroying existing chart:", e);
            }
        }
        
        // Prepare the chart container
        chartElement.innerHTML = '';
        
        // Create and render chart
        console.log("Attempting to create ApexCharts instance for tripProductChart");
        window.tripProductChart = new ApexCharts(chartElement, combinedOptions);
        
        // Add a small delay to ensure DOM is ready
        setTimeout(() => {
            console.log("Calling render() on tripProductChart");
            updateChartStatus("Rendering chart...");
            
            window.tripProductChart.render()
                .then(() => {
                    console.log("Chart rendered successfully");
                    updateChartStatus("Chart rendered successfully");
                })
                .catch(e => {
                    console.error("Error in render promise:", e);
                    updateChartStatus("Error rendering chart: " + e.message, true);
                    renderFallbackChart();
                });
                
            console.log("After render() call");
        }, 100);
    } catch (error) {
        console.error("Error in chart initialization:", error);
        updateChartStatus("Error initializing chart: " + error.message, true);
        renderFallbackChart();
    }
    
    // Fallback chart function
    function renderFallbackChart() {
        try {
            console.log("Trying fallback chart rendering...");
            updateChartStatus("Trying fallback chart...");
            
            // Clear any existing content
            chartElement.innerHTML = '';
            
            // Super simple fallback options
            const fallbackOptions = {
                series: [{
                    name: 'Sample Data',
                    data: [10, 15, 20, 25]
                }],
                chart: {
                    type: 'line',
                    height: 350,
                    toolbar: {
                        show: false
                    }
                },
                xaxis: {
                    categories: ['Jan', 'Feb', 'Mar', 'Apr']
                },
                title: {
                    text: 'Fallback Chart (Sample Data)',
                    align: 'center'
                }
            };
            
            const fallbackChart = new ApexCharts(chartElement, fallbackOptions);
            fallbackChart.render()
                .then(() => {
                    console.log("Fallback chart rendered successfully");
                    updateChartStatus("Fallback chart rendered successfully");
                })
                .catch(e => {
                    console.error("Fallback chart rendering failed:", e);
                    updateChartStatus("All chart rendering attempts failed. Please check console for details.", true);
                    
                    // Last resort - display a message with data
                    chartElement.innerHTML = `
                        <div style="padding:20px;text-align:center;">
                            <h4>Chart Rendering Failed</h4>
                            <p>Please check browser console for details.</p>
                            <div style="margin-top:20px;text-align:left;font-size:12px;">
                                <strong>Data Summary:</strong>
                                <pre style="background:#f5f5f5;padding:10px;overflow:auto;max-height:200px;">${JSON.stringify({
                                    months: months || [],
                                    completedTrips: completedTrips || [],
                                    cancelledTrips: cancelledTrips || [],
                                    products: productCounts || []
                                }, null, 2)}</pre>
                            </div>
                        </div>
                    `;
                });
        } catch (fallbackError) {
            console.error("Fallback rendering failed:", fallbackError);
            updateChartStatus("All chart rendering attempts failed completely.", true);
        }
    }
}

// Function to initialize the Order Tracking chart
function initializeOrderTrackingChart(dailyData, monthlyData) {
    // Store data globally for switching between views
    globalDailyOrderData = dailyData;
    globalMonthlyOrderData = monthlyData;
    
    const options = {
        series: [{
            name: 'Orders',
            data: dailyData.map(item => item.count)
        }],
        chart: {
            height: 350,
            type: 'line',
            toolbar: {
                show: false
            },
            zoom: {
                enabled: false
            },
            dropShadow: {
                enabled: true,
                top: 3,
                left: 0,
                blur: 4,
                opacity: 0.1,
            },
        },
        dataLabels: {
            enabled: false
        },
        stroke: {
            curve: 'smooth',
            colors: ['#6259ca'],
            width: 3
        },
        markers: {
            size: 4,
            colors: ['#6259ca'],
            strokeWidth: 0,
            hover: {
                size: 7,
            }
        },
        xaxis: {
            categories: dailyData.map(item => item.date),
        },
        grid: {
            borderColor: '#e9ecef',
        },
        tooltip: {
            y: {
                formatter: function(val) {
                    return val + " orders";
                }
            }
        }
    };
    
    // If chart already exists, destroy it before creating a new one
    if (orderTrackingChart) {
        orderTrackingChart.destroy();
    }
    
    orderTrackingChart = new ApexCharts(document.querySelector("#orderTrackingChart"), options);
    orderTrackingChart.render();
    
    // Set up event listener for switching between daily and monthly view
    document.getElementById('orderTrackingPeriod').addEventListener('change', function() {
        const period = this.value;
        updateOrderTrackingChart(period);
    });
}

// Function to update the Order Tracking chart based on selected period
function updateOrderTrackingChart(period) {
    const data = period === 'daily' ? globalDailyOrderData : globalMonthlyOrderData;
    
    // Update chart data
    orderTrackingChart.updateOptions({
        series: [{
            name: 'Orders',
            data: data.map(item => item.count)
        }],
        xaxis: {
            categories: data.map(item => period === 'daily' ? item.date : item.month)
        }
    });
    
    // Update the summary text
    const totalCount = data.reduce((sum, item) => sum + item.count, 0);
    document.getElementById('orderTrackingTotal').innerText = numberFormat(totalCount) + ' Orders';
    
    // Calculate and update percentage change
    if (data.length > 1) {
        const firstValue = data[0].count || 1;
        const lastValue = data[data.length - 1].count || 0;
        const percentageChange = ((lastValue / firstValue) - 1) * 100;
        document.getElementById('orderTrackingPercentage').innerText = percentageChange.toFixed(1) + '%';
    }
}

// Helper function to format numbers
function numberFormat(number) {
    return new Intl.NumberFormat().format(number);
}

// Initialize all charts when the document is loaded
// Add a logging function that writes to console and potentially to DOM
function logChartStatus(message, type = 'info') {
    const timestamp = new Date().toISOString().substring(11, 19);
    const fullMessage = `[${timestamp}] ${message}`;
    
    // Log to console with appropriate method
    if (type === 'error') {
        console.error(fullMessage);
    } else if (type === 'warning') {
        console.warn(fullMessage);
    } else {
        console.log(fullMessage);
    }
    
    // Create a log element if it doesn't exist
    if (!window.chartLogElement) {
        const logDiv = document.createElement('div');
        logDiv.id = 'chart-debug-log';
        logDiv.style.cssText = 'position:fixed; bottom:0; right:0; width:400px; max-height:200px; overflow:auto; background:rgba(0,0,0,0.7); color:white; font-family:monospace; font-size:11px; padding:10px; z-index:9999; display:none;';
        document.body.appendChild(logDiv);
        
        // Add a toggle button
        const toggleBtn = document.createElement('button');
        toggleBtn.textContent = 'Show Chart Debug Log';
        toggleBtn.style.cssText = 'position:fixed; bottom:10px; right:10px; z-index:10000; padding:5px 10px; font-size:12px; background:#333; color:white; border:none; cursor:pointer; display:none;';
        toggleBtn.onclick = function() {
            const logEl = document.getElementById('chart-debug-log');
            if (logEl.style.display === 'none') {
                logEl.style.display = 'block';
                this.textContent = 'Hide Chart Debug Log';
            } else {
                logEl.style.display = 'none';
                this.textContent = 'Show Chart Debug Log';
            }
        };
        document.body.appendChild(toggleBtn);
        
        window.chartLogElement = logDiv;
        window.chartLogToggle = toggleBtn;
        
        // Show debug tools with Ctrl+Shift+D
        document.addEventListener('keydown', function(e) {
            if (e.ctrlKey && e.shiftKey && e.key === 'D') {
                toggleBtn.style.display = toggleBtn.style.display === 'none' ? 'block' : 'none';
                e.preventDefault();
            }
        });
    }
    
    // Add log entry
    const logEntry = document.createElement('div');
    logEntry.className = `log-${type}`;
    logEntry.style.cssText = `margin:2px 0; padding:2px 5px; border-left:3px solid ${type === 'error' ? 'red' : type === 'warning' ? 'orange' : 'green'};`;
    logEntry.textContent = fullMessage;
    window.chartLogElement.appendChild(logEntry);
    
    // Keep only last 50 entries
    const entries = window.chartLogElement.querySelectorAll('div');
    if (entries.length > 50) {
        window.chartLogElement.removeChild(entries[0]);
    }
    
    // Auto-scroll to bottom
    window.chartLogElement.scrollTop = window.chartLogElement.scrollHeight;
}

// Main initialization event
document.addEventListener('DOMContentLoaded', function() {
    logChartStatus("DOM Content Loaded - Starting chart initialization");
    
    // Add global error handler
    window.addEventListener('error', function(e) {
        logChartStatus(`Global error caught: ${e.message}`, 'error');
        console.error('Error details:', e.error);
    });
    
    // Create direct inline chart as a test
    function renderInlineChart() {
        logChartStatus("Attempting to render inline test chart", 'info');
        
        try {
            // Only proceed if we have ApexCharts
            if (typeof ApexCharts === 'undefined') {
                logChartStatus("ApexCharts library not available for inline test", 'error');
                return false;
            }
            
            // Create a test container
            const testContainer = document.createElement('div');
            testContainer.id = 'inline-test-chart';
            testContainer.style.cssText = 'position:fixed; top:-1000px; left:-1000px; width:300px; height:200px;';
            document.body.appendChild(testContainer);
            
            // Create a simple chart
            const options = {
                series: [{
                    name: "Test",
                    data: [10, 20, 30]
                }],
                chart: {
                    type: 'line',
                    height: 200
                },
                xaxis: {
                    categories: ['A', 'B', 'C']
                }
            };
            
            const chart = new ApexCharts(testContainer, options);
            chart.render();
            
            // If we get here without errors, ApexCharts is working
            logChartStatus("Inline test chart rendered successfully", 'info');
            
            // Clean up after a delay
            setTimeout(() => {
                try {
                    chart.destroy();
                    document.body.removeChild(testContainer);
                } catch (e) {
                    // Ignore cleanup errors
                }
            }, 2000);
            
            return true;
        } catch (e) {
            logChartStatus(`Inline test chart failed: ${e.message}`, 'error');
            console.error('Inline chart error:', e);
            return false;
        }
    }
    
    // Check if ApexCharts is available
    if (typeof ApexCharts === 'undefined') {
        logChartStatus("ApexCharts library is not loaded! Charts will not render.", 'error');
        
        // Add visible error message to chart containers
        document.querySelectorAll("[id$='Chart']").forEach(el => {
            el.innerHTML = `
                <div style="padding:20px; text-align:center; border:1px solid #f8d7da; background:#fff3f5; color:#721c24;">
                    <h5>Chart Error</h5>
                    <p>The ApexCharts library could not be loaded. Please check your network connection or try refreshing the page.</p>
                </div>`;
        });
        
        // Try to append ApexCharts as a last resort
        const apexScript = document.createElement('script');
        apexScript.src = 'https://cdn.jsdelivr.net/npm/apexcharts@3.40.0/dist/apexcharts.min.js';
        apexScript.onload = function() {
            logChartStatus("ApexCharts library loaded dynamically", 'info');
            // Reinitialize charts after a delay
            setTimeout(initCharts, 500);
        };
        apexScript.onerror = function() {
            logChartStatus("Failed to load ApexCharts dynamically", 'error');
        };
        document.head.appendChild(apexScript);
        return;
    }
    
    // Check chart containers in the DOM
    const chartContainers = {};
    ['chart', 'barChart', 'tripOverviewDonutChart', 'tripProductChart', 'orderTrackingChart'].forEach(id => {
        const el = document.querySelector(`#${id}`);
        chartContainers[id] = !!el;
        if (!el) {
            logChartStatus(`Chart container #${id} not found in DOM`, 'warning');
        }
    });
    logChartStatus(`Chart containers found: ${Object.values(chartContainers).filter(Boolean).length} / ${Object.keys(chartContainers).length}`);
    
    // Validate dashboard data
    if (typeof dashboardData === 'undefined') {
        logChartStatus("dashboardData is undefined! Cannot initialize charts.", 'error');
        
        // Try to render a test chart anyway
        const testResult = renderInlineChart();
        
        if (testResult) {
            logChartStatus("ApexCharts seems to work despite missing data. This is a data issue.", 'info');
        } else {
            logChartStatus("ApexCharts functionality test failed. This may be a library issue.", 'error');
        }
        return;
    }
    
    logChartStatus("Dashboard data is available, continuing initialization");
    
    // Helper function to safely initialize charts
    function initCharts() {
        // Validate Monthly Trip & Product data specifically
        const hasTripData = !!(dashboardData.monthlyTripData && dashboardData.monthlyTripData.length);
        const hasProductData = !!(dashboardData.productCategoryData);
        
        logChartStatus(`Monthly Trip data available: ${hasTripData}, Product data available: ${hasProductData}`);
        
        // Try to render a test chart first
        renderInlineChart();
        
        // Initialize all charts with robust error handling
        [
            { name: 'Order Revenue', check: () => dashboardData.monthlyOrderData, init: () => initializeOrderRevenueChart(dashboardData.monthlyOrderData) },
            { name: 'Order Tracking', check: () => dashboardData.dailyOrderData && dashboardData.monthlyOrderData, init: () => initializeOrderTrackingChart(dashboardData.dailyOrderData, dashboardData.monthlyOrderData) },
            { name: 'Job Status', check: () => dashboardData.jobsByTypeData, init: () => initializeJobStatusChart(dashboardData.jobsByTypeData) },
            { name: 'Trip Overview', check: () => dashboardData.completedTrips !== undefined && dashboardData.cancelledTrips !== undefined && dashboardData.totalTrips !== undefined, init: () => initializeTripOverviewChart(dashboardData.completedTrips, dashboardData.cancelledTrips, dashboardData.totalTrips) },
            { name: 'World Map', check: () => dashboardData.ordersByLocation, init: () => initializeWorldMap(dashboardData.ordersByLocation) }
        ].forEach(chart => {
            try {
                if (chart.check()) {
                    logChartStatus(`Initializing ${chart.name} chart...`);
                    chart.init();
                    logChartStatus(`${chart.name} chart initialized`);
                } else {
                    logChartStatus(`Skipping ${chart.name} chart - data not available`, 'warning');
                }
            } catch (e) {
                logChartStatus(`Error initializing ${chart.name} chart: ${e.message}`, 'error');
                console.error(`${chart.name} chart error:`, e);
            }
        });
        
        // Special focus on Monthly Trips & Products chart
        logChartStatus("Initializing Monthly Trips & Products chart with extra attention");
        
        try {
            const tripChartEl = document.querySelector("#tripProductChart");
            
            if (!tripChartEl) {
                logChartStatus("#tripProductChart container not found in DOM", 'error');
                return;
            }
            
            // Verify the container dimensions
            const width = tripChartEl.offsetWidth;
            const height = tripChartEl.offsetHeight;
            logChartStatus(`Chart container dimensions: ${width}x${height}`);
            
            if (width === 0 || height === 0) {
                logChartStatus("Chart container has zero dimensions! Adding min-height", 'warning');
                tripChartEl.style.minHeight = '350px';
            }
            
            // Log the data we're using
            if (hasTripData && hasProductData) {
                logChartStatus("Using provided data for Monthly Trips & Products chart");
                initializeTripProductChart(dashboardData.monthlyTripData, dashboardData.productCategoryData);
            } else {
                logChartStatus("Using default data for Monthly Trips & Products chart", 'warning');
                const defaultTripData = [
                    { month: 'Jan', completed: 10, cancelled: 5 },
                    { month: 'Feb', completed: 15, cancelled: 7 },
                    { month: 'Mar', completed: 20, cancelled: 8 },
                    { month: 'Apr', completed: 18, cancelled: 6 },
                    { month: 'May', completed: 22, cancelled: 9 },
                    { month: 'Jun', completed: 25, cancelled: 10 }
                ];
                const defaultProductData = [12, 18, 22, 20, 25, 30];
                initializeTripProductChart(defaultTripData, defaultProductData);
            }
        } catch (e) {
            logChartStatus(`Error in Monthly Trips & Products chart: ${e.message}`, 'error');
            console.error('Monthly Trips & Products chart error:', e);
            
            // Create a direct inline chart as ultimate fallback
            try {
                const chartEl = document.getElementById("tripProductChart");
                if (chartEl) {
                    logChartStatus("Attempting direct inline chart as fallback", 'warning');
                    
                    // Clear the container
                    chartEl.innerHTML = '';
                    
                    // Directly add an ApexCharts instance
                    const options = {
                        series: [{
                            name: 'Trips',
                            type: 'column',
                            data: [10, 15, 20, 18, 22, 25]
                        }, {
                            name: 'Products',
                            type: 'line',
                            data: [12, 18, 22, 20, 25, 30]
                        }],
                        chart: {
                            height: 350,
                            type: 'line',
                        },
                        stroke: {
                            width: [0, 3]
                        },
                        title: {
                            text: 'Monthly Trips & Products (Fallback Chart)'
                        },
                        xaxis: {
                            categories: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun']
                        }
                    };
                    
                    const chart = new ApexCharts(chartEl, options);
                    chart.render();
                    logChartStatus("Direct fallback chart created", 'info');
                }
            } catch (fallbackError) {
                logChartStatus(`All fallback attempts failed: ${fallbackError.message}`, 'error');
                
                // Final HTML fallback
                const chartEl = document.getElementById("tripProductChart");
                if (chartEl) {
                    chartEl.innerHTML = `
                        <div style="padding:20px; text-align:center; border:1px solid #f8d7da; background:#fff3f5; color:#721c24;">
                            <h5>Chart Failed to Render</h5>
                            <p>We tried multiple approaches but couldn't render the chart.</p>
                            <p>Please check your browser console for technical details.</p>
                            <div style="margin-top:20px; border-top:1px solid #ccc; padding-top:10px;">
                                <strong>Data Summary:</strong>
                                <div style="display:flex; justify-content:space-around; margin-top:10px;">
                                    <div>
                                        <div style="height:20px; width:100px; background:#6259ca;"></div>
                                        <div>Completed Trips</div>
                                    </div>
                                    <div>
                                        <div style="height:20px; width:70px; background:#dc3545;"></div>
                                        <div>Cancelled Trips</div>
                                    </div>
                                    <div>
                                        <div style="height:20px; width:120px; background:#17a2b8;"></div>
                                        <div>Products</div>
                                    </div>
                                </div>
                            </div>
                        </div>`;
                }
            }
        }
    }
    
    // Start chart initialization
    initCharts();
});
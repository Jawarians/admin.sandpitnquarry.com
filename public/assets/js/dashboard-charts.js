/**
 * Dashboard Charts JavaScript
 * This file contains all the chart initialization logic
 */

// Function to initialize the Order Revenue chart
function initializeOrderRevenueChart(monthlyData) {
    const options = {
        series: [{
            name: 'Order Revenue',
            data: monthlyData.map(item => item.revenue)
        }, {
            name: 'Order Count',
            data: monthlyData.map(item => item.count)
        }],
        chart: {
            height: 350,
            type: 'area',
            toolbar: {
                show: false
            },
        },
        dataLabels: {
            enabled: false
        },
        stroke: {
            curve: 'smooth'
        },
        colors: ['#0162e8', '#00cccc'],
        xaxis: {
            categories: monthlyData.map(item => item.month),
        },
        tooltip: {
            x: {
                format: 'MMM'
            },
        },
    };
    
    const orderChart = new ApexCharts(document.querySelector("#chart"), options);
    orderChart.render();
}

// Function to initialize the Job Status chart
function initializeJobStatusChart(jobData) {
    const categories = Object.keys(jobData);
    const values = Object.values(jobData);
    
    const jobOptions = {
        series: [{
            name: 'Job Count',
            data: values
        }],
        chart: {
            type: 'bar',
            height: 230,
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
            categories: categories
        },
        colors: ['#6259ca']
    };

    const jobChart = new ApexCharts(document.querySelector("#barChart"), jobOptions);
    jobChart.render();
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
    const months = tripData.map(item => item.month);
    const completedTrips = tripData.map(item => item.completed || 0);
    const cancelledTrips = tripData.map(item => item.cancelled || 0);
    
    // Product data
    const productCounts = Object.values(productCategoryData).slice(0, months.length);
    
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
                show: false
            }
        },
        stroke: {
            width: [0, 0, 3]
        },
        colors: ['#6259ca', '#dc3545', '#17a2b8'],
        xaxis: {
            categories: months
        },
        yaxis: [{
            title: {
                text: 'Trips',
            },
        }, {
            opposite: true,
            title: {
                text: 'Products'
            }
        }],
        tooltip: {
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
    
    const tripProductChart = new ApexCharts(document.querySelector("#tripProductChart"), combinedOptions);
    tripProductChart.render();
}

// Initialize all charts when the document is loaded
document.addEventListener('DOMContentLoaded', function() {
    // The dashboard data will be injected from the blade template
    if (typeof dashboardData !== 'undefined') {
        if (dashboardData.monthlyOrderData) {
            initializeOrderRevenueChart(dashboardData.monthlyOrderData);
        }
        
        if (dashboardData.jobsByTypeData) {
            initializeJobStatusChart(dashboardData.jobsByTypeData);
        }
        
        if (dashboardData.completedTrips !== undefined && 
            dashboardData.cancelledTrips !== undefined && 
            dashboardData.totalTrips !== undefined) {
            initializeTripOverviewChart(
                dashboardData.completedTrips,
                dashboardData.cancelledTrips,
                dashboardData.totalTrips
            );
        }
        
        if (dashboardData.ordersByLocation) {
            initializeWorldMap(dashboardData.ordersByLocation);
        }
        
        if (dashboardData.monthlyTripData && dashboardData.productCategoryData) {
            initializeTripProductChart(
                dashboardData.monthlyTripData,
                dashboardData.productCategoryData
            );
        }
    }
});
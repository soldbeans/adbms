// dynamicTitle.js

// Function to set dynamic title based on page
function setPageTitle(pageTitle) {
    document.title = `${pageTitle} - Library Management System`;
}

// Example: Set title based on current page or URL
// Replace with actual logic based on your application
let currentPage = window.location.pathname;  // Example: /Home, /Catalog, etc.
switch (currentPage) {
    case '/Home':
        setPageTitle('Home');
        break;
    case '/Catalog':
        setPageTitle('Catalog');
        break;
    case '/Checkouts':
        setPageTitle('Checkouts');
        break;
    case '/Inventory':
        setPageTitle('Inventory');
        break;
    case '/Members':
        setPageTitle('Members');
        break;
    case '/Reports':
        setPageTitle('Reports');
        break;
    case '/addBook':
        setPageTitle('Add Book');
        break;
    default:
        setPageTitle('Library Management System');
        break;
}

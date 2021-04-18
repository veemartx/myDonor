
function handleRoute() {
    // get current the route 
    let currentroute = window.location.href;

    let currentResourceArr = currentroute.split('/');

    let currentResource = currentResourceArr[currentResourceArr.length - 1];




    if (currentResource == '') {

        currentResource = 'home'

        $('.breadcrumps').html('<a href="">Home</a>')

    }



    switch (currentResource) {
        case 'home':

            $('.mainContainerHolder').load('views/home.view.html');

            break;

        default:

            if (currentResource.includes('supplier?s=')) {

                $('.breadcrumps').html('<a>Home</a> / <a href="">Supplier</a>')

                $('.mainContainerHolder').load('views/supplier.view.html');

            }

            break;
    }

}

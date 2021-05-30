
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

        case 'users':

            $('.mainContainerHolder').load('views/users.view.html');

            break;

        case 'hospitals':

            $('.mainContainerHolder').load('views/hospitals.view.html');

            break;

        case 'centers':

            $('.mainContainerHolder').load('views/centers.view.html');

            break;

        case 'appointments':

            $('.mainContainerHolder').load('views/appointments.view.html');

            break;

        case 'donations':

            $('.mainContainerHolder').load('views/donations.view.html');

            break;

        case 'donation-settings':

            $('.mainContainerHolder').load('views/donation-settings.view.html');

            break;

        case 'requests':

            $('.mainContainerHolder').load('views/requests.view.html');

            break;
        default:

            if (currentResource.includes('user?u=')) {

                $('.mainContainerHolder').load('views/user.view.html');

            } else if (currentResource.includes('appointment?a=')) {

                $('.mainContainerHolder').load('views/appointment.view.html');

            }

            else if (currentResource.includes('donation?dn=')) {

                $('.mainContainerHolder').load('views/donation.view.html');

            }
            else if (currentResource.includes('appeal?a=')) {

                $('.mainContainerHolder').load('views/appeal.view.html');

            }

            else if (currentResource.includes('location?u=')) {

                $('.mainContainerHolder').load('views/location.view.html');

            }
            break;
    }

}

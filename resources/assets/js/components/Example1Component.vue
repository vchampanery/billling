
    import Vue from 'vue';
    import { VuejsDatatableFactory } from 'vuejs-datatable';

    Vue.use( VuejsDatatableFactory );

    new Vue({
    el: '#vue-root',
    data: {
        columns: [
            {label: 'id', field: 'id'},
            {label: 'Username', field: 'user.username', headerClass: 'class-in-header second-class'},
            {label: 'First Name', field: 'user.firstName'},
            {label: 'Last Name', field: 'user.lastName'},
            {label: 'Email', field: 'user.email'},
            {label: 'Address', representedAs: ({address, city, state}) => `${address}<br />${city}, ${state}`, interpolate: true}
        ],
        rows: [
             {
                id: 1,
                user: {
                    username: "dprice0",
                    firstName: "Daniel",
                    lastName: "Price",
                    email: "dprice0@blogs.com"
                },
                address: "3 Toban Park",
                city: "Pocatello",
                state: "Idaho"
            }
        ]
    }
});
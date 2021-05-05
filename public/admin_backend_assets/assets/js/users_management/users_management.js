/******/ (() => { // webpackBootstrap
/******/ 	"use strict";
var __webpack_exports__ = {};
/*!***********************************************************!*\
  !*** ../demo1/src/js/pages/custom/user/list-datatable.js ***!
  \***********************************************************/

// Class definition

var userId = null;
var userCounter = 1;
var base_url = window.location.origin;
var base_url2 = window.location.host;
var getUserList = "/admin/user/list";
var userEditUrl = window.location.href +"/edit?userID=";
var userShowUrl = window.location.href +"/show?userID=";
var userRemoveUrl = window.location.href +"/remove?userID=";
var userImageUrlPath = "http://"+base_url2+"/admin_backend_assets/assets/media/users";




var KTAppsUsersListDatatable = function() {
        // Private functions

        // basic demo
        var _demo = function() {
            var datatable = $('#kt_datatable').KTDatatable({
                // datasource definition
                data: {
                    type: 'remote',
                    source: {
                        read: {
                            url: HOST_URL + getUserList,
                        },
                    },
                    pageSize: 10, // display 20 records per page
                    serverPaging: true,
                    serverFiltering: true,
                    serverSorting: true,
                },

                // layout definition
                layout: {
                    scroll: false, // enable/disable datatable scroll both horizontal and vertical when needed.
                    footer: false, // display/hide footer
                },

                // column sorting
                sortable: true,

                pagination: true,

                search: {
                    input: $('#kt_subheader_search_form'),
                    delay: 400,
                    key: 'generalSearch'
                },



                // columns definition
                columns: [
                    {
                        field: 'row_no',
                        title: '#',
                        sortable: 'asc',
                        width: 40,
                        type: 'number',
                        selector: false,
                        textAlign: 'left',
                        template: function(data) {
                            var output = '';

                            output = '<span class="font-weight-bolder">' + data.row_no + '</span>';

                            return output;
                        }
                    }, {
                        field: '',
                        title: 'User',
                        width: 250,
                        template: function(row) {

                            userId =  row.user_id;

                            var output = '';

                                output = '<div class="d-flex align-items-center">\
								<div class="symbol symbol-40 symbol-sm flex-shrink-0">\
									<img class="" src="'+ userImageUrlPath+ "/" + row.user_pic +'" alt="photo">\
								</div>\
								<div class="ml-4">\
									<div class="text-dark-75 font-weight-bolder font-size-lg mb-0">' + row.user_first_name+" "+row.user_last_name+ '</div>\
									<a href="#" class="text-muted font-weight-bold text-hover-primary">' + row.user_email + '</a>\
								</div>\
							</div>';



                            return output;
                        }
                    }, {
                        field: 'Country',
                        title: 'Country',
                        template: function(row) {
                            var output = '';

                            output += '<div class="font-weight-bolder font-size-lg mb-0">' + row.user_country + '</div>';
                            output += '<div class="font-weight-bold text-muted">Code: ' + row.user_country + '</div>';

                            return output;
                        }
                    }, {
                        field: 'user_created_at',
                        title: 'Register At',
                        type: 'date',
                        format: 'MM/DD/YYYY',
                        template: function(row) {

                            var output = '';

                            output += '<div class="font-weight-bolder text-primary mb-0">' + row.user_created_at + '</div>';

                            return output;
                        },
                    }, {
                        field: 'user_update_at',
                        title: 'Last Seen',
                        type: 'date',
                        format: 'MM/DD/YYYY',
                        template: function(row) {
                            var output = '';

                            output += '<div class="font-weight-bold text-muted">' + row.user_updated_at + '</div>';

                            return output;
                        }
                    },{
                        field: 'user_email_verified_at',
                        title: 'Status',
                        template: function(row) {
                            var status = {
                                1: {'title': 'Pending', 'class': ' label-light-primary'},
                                2: {'title': 'Delivered', 'class': ' label-light-danger'},
                                4: {'title': 'Success', 'class': ' label-light-success'},
                                5: {'title': 'Info', 'class': ' label-light-info'},
                                7: {'title': 'Warning', 'class': ' label-light-warning'},
                            };

                            var value = 1;
                            if(row.user_email_verified_at!=null)
                            {

                                value = 4;

                            }

                            return '<span class="label label-lg font-weight-bold ' + status[value].class + ' label-inline">' + status[value].title + '</span>';
                        },
                    },{
                        field: 'Actions',
                        title: 'Actions',
                        sortable: false,
                        width: 130,
                        overflow: 'visible',
                        autoHide: false,
                        template: function() {
                            var output = '';

                            output = ' <a href="'+ userShowUrl+userId+'"><i class="fa fa-user" id="'+ userId+'" onclick="showUser()" onmouseover="" style="cursor: pointer;"></i></a>&nbsp;&nbsp;\
	                      <a href="'+ userEditUrl+userId+'"><i class="fa fa-edit" id="'+ userId+'" onmouseover="" style="cursor: pointer;"></i></a>&nbsp;&nbsp;\
	                      <a id="'+ userId+'" onclick="removeUser(this.id)"><i class="fa fa-trash"  onmouseover="" style="cursor: pointer;"></i></a>\
	                     ';

                            return output;

                        },

                    }],
            });

            $('#kt_datatable_search_status').on('change', function() {
                datatable.search($(this).val().toLowerCase(), 'User');
            });

            $('#kt_datatable_search_type').on('change', function() {
                datatable.search($(this).val().toLowerCase(), 'Type');
            });

            $('#kt_datatable_search_status, #kt_datatable_search_type').selectpicker();
        };

        return {
            // public functions
            init: function() {
                _demo();
            },
        };
    }();



jQuery(document).ready(function() {
	KTAppsUsersListDatatable.init();
});

/******/ })()
;
//# sourceMappingURL=list-datatable.js.map



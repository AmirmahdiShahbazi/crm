$(document).ready(function() {
    $('product-list').DataTable();
    // Basic table example 
    $('#basic-1').DataTable();
    $('#basic-2').DataTable({
        "paging":   true,
        "ordering": false,
        "info":     false
    });
    $('#basic-3').DataTable({
        "order": [[ 3, "desc" ]]
    });
    $('#basic-4').DataTable({
        columnDefs: [ {
            targets: [ 0 ],
            orderData: [ 0, 1 ]
        }, {
            targets: [ 1 ],
            orderData: [ 1, 0 ]
        }, {
            targets: [ 4 ],
            orderData: [ 4, 0 ]
        } ]
    });
    $('table.show-case').DataTable();
    $('#basic-5').DataTable({
        "columnDefs": [
            {
                "targets": [ 2 ],
                "visible": false,
                "searchable": false
            },
            {
                "targets": [ 3 ],
                "visible": false
            }
        ]
    });
    $('#basic-6').DataTable();
    $('#basic-7').DataTable({
        "dom": '<"wrapper"ltipf>'
    });
    $('#basic-8').DataTable();
    $('#basic-9').DataTable({
        stateSave: true
    });
    $('#basic-10').DataTable({
        "pagingType": "full_numbers"
    });
    $('#basic-11').DataTable({
        "scrollY":        "200px",
        "scrollCollapse": true,
        "paging":         false
    });
    $('#basic-12').DataTable({
        scrollY: '40vh',
        scrollCollapse: true,
        paging:         false
    });
    $('#basic-13').DataTable({
        "scrollY": 200,
        "scrollX": true
    });
    $('#basic-14').DataTable({
        "language": {
            "decimal": ",",
            "thousands": "."
        }
    });
    // Advance data table
    var table = $('#advance-1').DataTable();
    $('#advance-1 tbody').on('click', 'tr', function () {
        var data = table.row( this ).data();
        alert( 'You clicked on '+data[0]+'\'s row' );
    });
    var eventFired = function ( type ) {
        var n = $('#demo_info')[0];
        n.innerHTML += '<div class="me-2"><b>رویداد '+type+' - </b>'+new Date().getTime()+'</div>';
        n.scrollTop = n.scrollHeight;
    }
    $('#advance-2')
        .on( 'order.dt',  function () { eventFired( 'سفارش' ); } )
        .on( 'search.dt', function () { eventFired( 'جستجو' ); } )
        .on( 'page.dt',   function () { eventFired( 'صفحه' ); } )
        .DataTable();
    $('#advance-3').DataTable({
        "columnDefs": [
            {
                "render": function ( data, type, row ) {
                    return data +' ('+ row[3]+')';
                },
                "targets": 0
            },
            { "visible": false,  "targets": [ 3 ] }
        ]
    });
    $('#advance-4').DataTable({
        "lengthMenu": [[10, 25, 50, -1], [10, 25, 50, "All"]]
    });
    $('#advance-5').DataTable({
        "dom": '<"top"iflp<"clear">>rt<"bottom"iflp<"clear">>'
    });
    $('#advance-6').DataTable({
        "columnDefs": [ {
            "visible": false,
            "targets": -1
        } ]
    });
    $('#advance-7').DataTable({
        "columns": [
            { "data": "name" },
            { "data": "position" },
            { "data": "office" },
            { "data": "age" },
            { "data": "start_date" },
            { "data": "salary" }
        ]
    });
    $('#advance-8').DataTable({
        "language": {
            "url": "../assets/json/German.json"
        }
    });
    $('#advance-9').DataTable({
        "searching": false,
        "ordering": false
    });
    $('#advance-10').DataTable({
        "createdRow": function ( row, data, index ) {
            if ( data[5].replace(/[\تومان,]/g, '') * 1 > 6000000 ) {
                $('td', row).eq(5).addClass('text-danger');
            }
        }
    });
    var table = $('#advance-11').DataTable({
        "columnDefs": [
            { "visible": false, "targets": 2 }
        ],
        "order": [[ 2, 'asc' ]],
        "displayLength": 25,
        "drawCallback": function ( settings ) {
            var api = this.api();
            var rows = api.rows( {page:'current'} ).nodes();
            var last=null;
            api.column(2, {page:'current'} ).data().each( function ( group, i ) {
                if ( last !== group ) {
                    $(rows).eq( i ).before(
                        '<tr class="group"><td colspan="5">'+group+'</td></tr>'
                    );
                    last = group;
                }
            });
        }
    });
    $('#advance-11 tbody').on( 'click', 'tr.group', function () {
        var currentOrder = table.order()[0];
        if ( currentOrder[0] === 2 && currentOrder[1] === 'asc' ) {
            table.order( [ 2, 'desc' ] ).draw();
        }
        else {
            table.order( [ 2, 'asc' ] ).draw();
        }
    });
    $('#advance-12').DataTable({
        "footerCallback": function ( row, data, start, end, display ) {
            var api = this.api(), data;
            var intVal = function ( i ) {
                return typeof i === 'string' ?
                i.replace(/[\$,]/g, '')*1 :
                typeof i === 'number' ?
                i : 0;
            };
            total = api
                .column( 4 )
                .data()
                .reduce( function (a, b) {
                    return intVal(a) + intVal(b);
                }, 0);
            pageTotal = api
                .column( 4, { page: 'current'} )
                .data()
                .reduce( function (a, b) {
                    return intVal(a) + intVal(b);
                }, 0 );
            $( api.column( 4 ).footer() ).html(
                '$'+pageTotal +' ( $'+ total +' total)'
            );
        }
    });
    $('#advance-13').DataTable({
        "dom": '<"toolbar">frtip'
    });
    $("div.toolbar").html('<b>سلام این نوار ابزار سفارشی است</b>');
    $('#advance-14').DataTable({
        "aoColumns": [
            null,
            null,
            { "orderSequence": [ "asc" ] },
            { "orderSequence": [ "desc", "asc", "asc" ] },
            { "orderSequence": [ "desc" ] },
            null
        ]
    });
    $('#example-style-1').DataTable();
    $('#example-style-2').DataTable();
    $('#example-style-3').DataTable();
    $('#example-style-4').DataTable();
    $('#example-style-5').DataTable();
    $('#example-style-6').DataTable();
    $('#example-style-7').DataTable();
    $('#example-style-8').DataTable();
    // Data sources tables
    $('#data-source-1').DataTable();
    $('#data-source-2').DataTable({
        "ajax": '../assets/ajax/arrays.txt'
    });
    var dataSet = [
        [ "امیر صبوری", "معمار سیستم", "تهران", "5421", "1396/04/25", "8,430,000 تومان" ],
        [ "یلدا رجبی", "حسابدار", "شیراز", "8422", "1396/07/25", "5,290,000 تومان" ],
        [ "مرتضی رجبی", "نویسنده فنی", "مشهد", "1562", "1393/01/12", "8,655,000 تومان" ],
        [ "پریسا توکلی", "توسعه دهنده جاوا اسکریپت", "تهران", "6224", "1397/03/29", "7,140,000 تومان" ],
        [ "آتوسا رحیمی", "حسابدار", "شیراز", "5407", "1392/11/28", "5,850,000 تومان" ],
        [ "دریا غفاری", "مدیر داخلی", "تبریز", "4804", "1397/12/02", "6,995,000 تومان" ],
        [ "حسین اسکندری", "دستیار فروش", "مشهد", "9608", "1397/08/06", "6,280,000 تومان" ],
        [ "رکسانا حسینی", "مدیر داخلی", "شیراز", "6200", "1395/10/14", "7,300,000 تومان" ],
        [ "کیمیا علیپور", "توسعه دهنده جاوا اسکریپت", "مشهد", "2360", "1393/09/15", "5,224,000 تومان" ],
        [ "سونیا مقدسی", "مهندس نرم افزار", "تهران", "1667", "1392/12/13", "6,709,000 تومان" ],
        [ "رعنا رئوفی", "مدیر دفتر", "کرمانشاه", "3814", "1392/12/19", "9,324,000 تومان" ],
        [ "کامبیز محمدی", "مدیر پشتیبانی", "تهران", "9497", "1398/03/03", "3,470,000 تومان" ],
        [ "شایان غفوری", "نویسنده وب", "مشهد", "6741", "1392/10/16", "6,725,000 تومان" ],
        [ "هلیا کاشفی", "طراح بازاریابی", "کرمانشاه", "3597", "1397/12/18", "4,275,000 تومان" ],
        [ "ترانه هاشمی", "نویسنده وب", "کرمانشاه", "1965", "1395/03/17", "3,855,000 تومان" ],
        [ "مسعود نبوی", "مدیر بازاریابی", "کرمانشاه", "1581", "1397/11/27", "8,195,000 تومان" ],
        [ "پدرام عالیشاه", "مدیر امور مالی", "تبریز", "3059", "1395/06/09", "5,760,000 تومان" ],
        [ "مبینا معصومی", "مدیر سیستم", "تبریز", "1721", "1393/04/10", "7,250,000 تومان" ],
        [ "بهنام خادمی", "مهندس نرم افزار", "کرمانشاه", "2558", "1397/10/13", "5,315,000 تومان" ],
        [ "درسا وحیدی", "مدیر سئو", "تهران", "2290", "1397/09/26", "9,417,000 تومان" ],
        [ "سمیه رشیدی", "مسئول تیم توسعه", "تبریز", "1937", "1396/09/03", "4,325,000 تومان" ],
        [ "یلدا سبحانی", "بازاریاب", "تبریز", "6154", "1393/06/25", "8,630,000 تومان" ],
        [ "کامران تفرشی", "پشتیبانی فروش", "تبریز", "8330", "1396/12/12", "6,137,000 تومان" ],
        [ "ملیکا حسنی", "دستیار فروش", "سمنان", "3023", "1395/09/20", "5,729,000 تومان" ],
        [ "آتنا غفوری", "سرپرست سئو", "کرمانشاه", "5797", "1393/10/09", "9,875,000 تومان" ],
        [ "حسین اسلامی", "توسعه دهنده", "تهران", "8822", "1395/12/22", "9,260,000 تومان" ],
        [ "داوود مومنی", "نویسنده وب", "سنندج", "9239", "1395/11/14", "5,375,000 تومان" ],
        [ "مهرنوش توکلی", "مهندس نرم افزار", "مشهد", "1314", "1396/06/07", "6,250,000 تومان" ],
        [ "فرانک جعفری", "مدیر داخلی", "مشهد", "2947", "1395/03/11", "8,100,000 تومان" ],
        [ "شادی کریمی", "بازاریاب", "شیراز", "8899", "1396/08/14", "6,300,000 تومان" ],
        [ "کیوان هدایتی", "مدیر داخلی", "سمنان", "2769", "1396/06/02", "5,485,000 تومان" ],
        [ "ثریا فرامرزی", "توسعه دهنده", "کرمانشاه", "6832", "1393/10/22", "9,224,000 تومان" ],
        [ "پریا عبداللهی", "نویسنده تکنیکی", "کرمانشاه", "3606", "1396/05/07", "7,345,000 تومان" ],
        [ "جواد مظفری", "مدیر تیم", "مشهد", "2860", "1392/10/26", "4,899,000 تومان" ],
        [ "مینا نظامی", "پشتیبان ارسال محصول", "تهران", "8240", "1396/03/09", "3,900,000 تومان" ],
        [ "امید بهادری", "مدیر بازاریابی", "مشهد", "5384", "1393/12/09", "8,439,000 تومان" ]
    ];
    $('#data-source-3').DataTable({
        data: dataSet,
        columns: [
            { title: "نام" },
            { title: "موقعیت شغلی" },
            { title: "دفتر" },
            { title: "کدپستی" },
            { title: "تاریخ شروع" },
            { title: "حقوق" }
        ]
    });
    $('#data-source-4').DataTable({
        "processing": true,
        "serverSide": true,
        "ajax": "../assets/json/server-side.json"
    } );



    // API Data Tables
    var t = $('#API-1').DataTable();
    var counter = 10;
    $('#addRow').on( 'click', function () {
        t.row.add( [
            counter +'1',
            counter +'.2',
            counter +'.3',
            counter +'.4',
            counter +'.5'
        ]).draw(false);
        counter++;
    });
    // Automatically add a first row of data
    $('#addRow').click();
    $('#addRow').click();
    $('#addRow').click();
    // Setup - add a text input to each footer cell
    $('#API-2 tfoot th').each( function () {
        var title = $(this).text();
        $(this).html( '<input type="text" placeholder="جستجو '+title+'" />' );
    } );
    var table = $('#API-2').DataTable();
    table.columns().every( function () {
        var that = this;
        $( 'input', this.footer() ).on( 'keyup change', function () {
            if ( that.search() !== this.value ) {
                that
                    .search( this.value )
                    .draw();
            }
        });
    });
    $('#API-3').DataTable({
        initComplete: function () {
            this.api().columns().every( function () {
                var column = this;
                var select = $('<select><option value=""></option></select>')
                    .appendTo( $(column.footer()).empty() )
                    .on( 'change', function () {
                    var val = $.fn.dataTable.util.escapeRegex(
                        $(this).val()
                    );
                    column
                        .search( val ? '^'+val+'$' : '', true, false )
                        .draw();
                    });
                    column.data().unique().sort().each( function ( d, j ) {
                    select.append( '<option value="'+d+'">'+d+'</option>' )
                });
            });
        }
    });
    var table = $('#API-4').DataTable();
        $('#API-4 tbody')
        .on( 'mouseenter', 'td', function () {
            var colIdx = table.cell(this).index().column;
            $( table.cells().nodes() ).removeClass( 'highlight' );
            $( table.column( colIdx ).nodes() ).addClass( 'highlight' );
        });
    function format ( d ) {
        return '<table cellpadding="5" cellspacing="0" border="0" style="padding-left:50px;">'+
            '<tr>'+
            '<td>نام کامل : </td>'+
            '<td>'+d.name+'</td>'+
            '</tr>'+
            '<tr>'+
            '<td>کد پستی : </td>'+
            '<td>'+d.extn+'</td>'+
            '</tr>'+
            '<tr>'+
            '<td>اطلاعات اضافی : </td>'+
            '<td>و هر جزئیات مفید دیگری در اینجا (تصاویر و غیره) ...</td>'+
            '</tr>'+
            '</table>';
    }
    //chield row multiple data table start here
    var ct = $('#API-chield-row').DataTable({
        "ajax": "../assets/ajax/api.txt",
        "columns": [{
            "className": 'details-control',
            "orderable": false,
            "data": null,
            "defaultContent": ''
        }, {
            "data": "name"
        }, {
            "data": "position"
        }, {
            "data": "office"
        }, {
            "data": "salary"
        }],
            "order": [
                [1, 'asc']
            ]
    });
    $('#API-chield-row tbody').on('click', 'td.details-control', function() {
        var tr = $(this).closest('tr');
        var row = ct.row(tr);
        if (row.child.isShown()) {
            row.child.hide();
            tr.removeClass('shown');
        } else {
            row.child(format(row.data())).show();
            tr.addClass('shown');
        }
    });
    //chield row multiple data table end here
    //row select multiple data table start here
    var srow = $('#row-select-multiple').DataTable();
    $('#row-select-multiple tbody').on('click', 'tr', function() {
        $(this).toggleClass('selected');
    });
    $('#multiple-row-select-btn').on('click', function() {
        alert(srow.rows('.selected').data().length + ' ردیف انتخاب شده است');
    });
    //row select multiple data table end here
    //single row delete data table start here        
    var deleterow = $('#row-select-delete').DataTable();
    $('#row-select-delete tbody').on('click', 'tr', function() {
        if ($(this).hasClass('selected')) {
            $(this).removeClass('selected');
        } else {
            deleterow.$('tr.selected').removeClass('selected');
            $(this).addClass('selected');
        }
    });
    $('#single-row-delete-btn').on('click', function() {
        deleterow.row('.selected').remove().draw(!1);
    });
    //single row delete data table end here        
    //form input submit start here
    var table = $('#form-input-datatable').DataTable();
    $('#form-input-datatable-submit').on('click', function() {
        var data = table.$('input, select').serialize();
        alert("The following data would have been submitted to the server: \n\n" + data.substr(0, 120) + '...');
        return false;
    });
    //form input submit end here
    //show hide column start here
    var sh = $('#show-hide-datatable').DataTable({
        "scrollY": "200px",
        "paging": false
    });
    //show hide column end here
    //seach API regular expression start
    function filterGlobal() {
        $('#search-api-datatable').DataTable().search($('#g-filter').val(), $('#global_regex').prop('checked'), $('#global_smart').prop('checked')).draw();
    }
    function filterColumn(i) {
        $('#search-api-datatable').DataTable().column(i).search($('#col' + i + '_filter').val(), $('#col' + i + '_regex').prop('checked'), $('#col' + i + '_smart').prop('checked')).draw();
    }
    $('#search-api-datatable').DataTable();
    $('input.g-filter').on('keyup click', function() {
        filterGlobal();
    });
    $('input.column_filter').on('keyup click', function() {
        filterColumn($(this).parents('tr').attr('data-column'));
    });
    //seach API regular expression start
    //Ajax Data Source (Arrays) start 
    $('#ajax-data-array').DataTable({
        "ajax": "../assets/ajax/arrays.txt",
    });
    //Ajax Data Source (Arrays) start 
    //Ajax Data Source (object) start             
    $('#ajax-data-object').DataTable({
        "ajax": "../assets/ajax/object.txt",
        "columns": [{
            "data": "name"
        }, {
            "data": "position"
        }, {
            "data": "office"
        }, {
            "data": "extn"
        }, {
            "data": "start_date"
        }, {
            "data": "salary"
        }]
    });
    //Ajax Data Source (object) end 
    //Ajax nested object data start 
    $('#ajax-data-nested-object').DataTable({
        "processing": true,
        "ajax": "../assets/ajax/object_nested.txt",
        "columns": [{
            "data": "name"
            }, {
                "data": "hr.position"
            }, {
                "data": "contact.0"
            }, {
                "data": "contact.1"
            }, {
                "data": "hr.start_date"
            }, {
                "data": "hr.salary"
        }]
    });
    //Ajax nested object data start 
    //Ajax orthogonal data start here
    $('#orthogonal-data').DataTable({
        ajax: "../assets/ajax/orthogonal.txt",
        columns: [{
            data: "name"
        }, {
            data: "position"
        }, {
            data: "office"
        }, {
            data: "extn"
        }, {
            data: {
                _: "start_date.display",
                sort: "start_date.timestamp"
            }
        }, {
            data: "salary"
        }]
    });
    //Ajax orthogonal data end here
    // Ajax Generated content for a column start
    var generatetable = $('#auto-generate-content').DataTable({
        "ajax": "../assets/ajax/arrays.txt",
        "columnDefs": [{
            "targets": -1,
            "data": null,
            "defaultContent": "<button>کلیک کنید!</button>"
        }]
    });
    $('#auto-generate-content tbody').on('click', 'button', function() {
        var data = generatetable.row($(this).parents('tr')).data();
        alert("حقوق ' " + data[0] + " ' برابر است با :  " + data[5]);
    });
    // Ajax Generated content for a column end
    //Ajax render start here
    $('#render-datatable').DataTable({
        "ajax": "../assets/ajax/arrays.txt",
        "deferRender": true
    });
    //Ajax render end here
    // Server Side proccessing start
    $('#server-side-datatable').DataTable( {
        "processing": true,
        "serverSide": true,
        "ajax": "../assets/json/server-side.json"
    });
    //http server side datatable start   
    $('#datatable-http').DataTable({
        "processing": true,
        "serverSide": true,
        "ajax": {
            url: "../assets/json/server-side2.json",
            data: function(d) {
                d.myKey = "myValue";
            }
        },  
        "columns": [{
            "data": "first_name"
        }, {
            "data": "last_name"
        }, {    
            "data": "position"
        }, {
            "data": "office"    
        }, {
            "data": "start_date"
        }, {
            "data": "salary"
        }]
    });
    //http server side datatable end
    //datatable post start here
    $('#datatable-post').DataTable({
        "processing": true,
        "serverSide": true,
        "ajax": {
            url: "../assets/json/server-side2.json",
            type: "post"
        },
        "columns": [{
            "data": "first_name"
        }, {
            "data": "last_name"
        }, {
            "data": "position"
        }, {
            "data": "office"
        }, {
            "data": "start_date"
        }, {
            "data": "salary"
        }]
    });
    //API plug-in methods
    $.fn.dataTable.Api.register('column().data().sum()', function () {
        return this.reduce(function (a, b) {
            var x = parseFloat(a) || 0;
            var y = parseFloat(b) || 0;
            return x + y;
        });
    });
    //datatable post start here
    var table = $('#dt-plugin-method').DataTable();
    $('<button class="btn btn-primary  m-b-20">مجموع سن در همه ردیف ها</button>').prependTo('.dt-plugin-buttons').on('click', function() {
        alert('جمع ستون عبارت است از: ' + table.column(3).data().sum());
    });
    $('<button class="btn btn-primary m-r-10 m-b-20">مجموع سن ردیف های قابل مشاهده</button>').prependTo('.dt-plugin-buttons').on('click', function() {
        alert('جمع ستون عبارت است از: ' + table.column(3, {
            page: 'current'
        }).data().sum());
    });
    //Api datatable end here
    //Ordering Plug-ins (with type detection) start here
    $.fn.dataTable.ext.type.detect.unshift(function(d) {
        return d === 'Low' || d === 'Medium' || d === 'High' ? 'salary-grade' : null;
    });
    $.fn.dataTable.ext.type.order['salary-grade-pre'] = function(d) {
        switch (d) {
            case 'Low':
                return 1;
            case 'Medium':
                return 2;
            case 'High':
                return 3;
        }
        return 0;
    };
    $('#datatable-ordering').DataTable();
    //Ordering Plug-ins (with type detection) end here
    //Range plugin datatable start here
    $.fn.dataTable.ext.search.push(function(settings, data, dataIndex) {
        var min = parseInt($('#min').val(), 10);
        var max = parseInt($('#max').val(), 10);
        var age = parseFloat(data[3]) || 0;
        if ((isNaN(min) && isNaN(max)) || (isNaN(min) && age <= max) || (min <= age && isNaN(max)) || (min <= age && age <= max)) {
            return true;
        }
            return false;
    });
    var dtage = $('#datatable-range').DataTable();
    $('#min, #max').keyup(function() {
        dtage.draw();
    });
    //Range plugin datatable end here    
    //datatable dom ordering start here
    $.fn.dataTable.ext.order['dom-text'] = function(settings, col) {
        return this.api().column(col, {
            order: 'index'
        }).nodes().map(function(td, i) {
            return $('input', td).val();
        });
    }
    $.fn.dataTable.ext.order['dom-text-numeric'] = function(settings, col) {
        return this.api().column(col, {
            order: 'index'
        }).nodes().map(function(td, i) {
            return $('input', td).val() * 1;
        });
    }
    $.fn.dataTable.ext.order['dom-select'] = function(settings, col) {
        return this.api().column(col, {
            order: 'index'
        }).nodes().map(function(td, i) {
            return $('select', td).val();
        });
    }   
    $.fn.dataTable.ext.order['dom-checkbox'] = function(settings, col) {
        return this.api().column(col, {
            order: 'index'
        }).nodes().map(function(td, i) {
            return $('input', td).prop('checked') ? '1' : '0';
        });
    }
    $(document).ready(function() {
        $('#datatable-livedom').DataTable({
            "columns": [null, {
                "orderDataType": "dom-text-numeric"
            }, {
                "orderDataType": "dom-text",
                type: 'string'
            }, {
                "orderDataType": "dom-select"
            }]
        });
    });
    //datatable dom ordering end here


});
</div>

<!-- footer start-->
<footer class="footer">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-12 footer-copyright text-center">
        <p class="mb-0">کپی رایت 2022 © تمامی حقوق محفوظ است </p>
      </div>
    </div>
  </div>
</footer>
</div>
</div>
<script src="../assets/js/jquery-3.5.1.min.js"></script>
<script src="../assets/js/bootstrap/bootstrap.bundle.min.js"></script>
<script src="../assets/js/icons/feather-icon/feather.min.js"></script>
<script src="../assets/js/icons/feather-icon/feather-icon.js"></script>
<script src="../assets/js/scrollbar/simplebar.js"></script>
<script src="../assets/js/scrollbar/custom.js"></script>
<script src="../assets/js/config.js"></script>
<script src="../assets/js/sidebar-menu.js"></script>
<script src="../assets/js/rating/jquery.barrating.js"></script>
<script src="../assets/js/rating/rating-script.js"></script>
<script src="../assets/js/owlcarousel/owl.carousel.js"></script>
<script src="../assets/js/slick-slider/slick.min.js"></script>
<script src="../assets/js/slick-slider/slick-theme.js"></script>
<script src="../assets/js/chart/knob/knob.min.js"></script>
<script src="../assets/js/chart/knob/knob-chart.js"></script>
<script src="../assets/js/chart/apex-chart/apex-chart.js"></script>
<script src="../assets/js/chart/apex-chart/stock-prices.js"></script>
<script src="../assets/js/notify/bootstrap-notify.min.js"></script>
<script src="../assets/js/dashboard/default.js"></script>
<script src="../assets/js/notify/index.js"></script>
<script src="../assets/js/datepicker/date-picker/datepicker.js"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script src="../assets/js/datepicker/date-picker/datepicker.en.js"></script>
<script src="../assets/js/datepicker/date-picker/datepicker.custom.js"></script>
<script src="../assets/js/photoswipe/photoswipe.min.js"></script>
<script src="../assets/js/photoswipe/photoswipe-ui-default.min.js"></script>
<script src="../assets/js/photoswipe/photoswipe.js"></script>
<script src="../assets/js/typeahead/handlebars.js"></script>
<script src="../assets/js/typeahead/typeahead.bundle.js"></script>
<script src="../assets/js/typeahead/typeahead.custom.js"></script>
<script src="../assets/js/typeahead-search/handlebars.js"></script>
<script src="../assets/js/typeahead-search/typeahead-custom.js"></script>
<script src="../assets/js/height-equal.js"></script>
<script src="../assets/js/script.js"></script>
<script src="../assets/js/theme-customizer/customizer.js"></script>
<script src="../assets/js/datatable/datatables/jquery.dataTables.min.js"></script>
<script src="../assets/js/datatable/datatables/datatable.custom.js"></script>
<script src="../assets/js/editor/ckeditor/ckeditor.js"></script>
<script src="../assets/js/editor/ckeditor/adapters/jquery.js"></script>
<script src="../assets/js/dropzone/dropzone.js"></script>
<script src="../assets/js/dropzone/dropzone-script.js"></script>
<script src="../assets/js/email-app.js"></script>
<script src="../assets/js/persiandatepicker/persian-date-0.1.8.min.js"></script>
<script src="../assets/js/persiandatepicker/persian-datepicker-0.4.5.min.js"></script>
<script type="text/javascript" src="https://unpkg.com/@majidh1/jalalidatepicker/dist/jalalidatepicker.min.js"></script>



<script>
  $(document).ready(function() {
    jalaliDatepicker.startWatch();

    $('.js-example-basic-single').select2();

  });
</script>
<script>
  $('.datepicker2').persianDatepicker({

    'format': 'YYYY/MM/DD',
    timePicker: {
      enabled: true
    },
  });

  $('.datepicker3').persianDatepicker({
    'format': 'YYYY/MM/DD',
    initialValue: false
  });

  $('.datepicker4').persianDatepicker({
    'format': 'YYYY/MM/DD',
    initialValueType: 'persian'
  });

  $('.datepicker5').persianDatepicker({
    format: 'LLLL',
    timePicker: {
      enabled: true
    },
  });

  $('.datepicker6').persianDatepicker({
    format: 'YYYY/MM/DD',
    viewMode: 'month',
  });

  $('.datepicker7').persianDatepicker({
    format: 'YYYY/MM/DD',
    minDate: new persianDate()
  });

  $('.datepicker8').persianDatepicker({
    format: 'YYYY/MM/DD',
    maxDate: new persianDate()
  });

  $('.datepicker9').persianDatepicker({
    format: 'YYYY/MM/DD',
    autoClose: true
  });

  $("#tarikh").persianDatepicker({
    altField: "#tarikhAlt",
    altFormat: "X",
    format: "D MMMM YYYY",
    timePicker: {
      enabled: true
    },
    observer: true
  });

  $(".taghvim").persianDatepicker({
    inline: true,
    altFormat: 'LLLL'
  });

  jQuery(document).ready(function() {
    jQuery("#taghvim").persianDatepicker({
      altFormat: "X",
      format: "YYYY/MM/DD",
      observer: true
    });
  });
</script>

<script>
  var to, from;
  to = $(".datepicker11").persianDatepicker({
    altField: '.datepicker11-alt',
    altFormat: 'LLLL',
    initialValue: false,
    onSelect: function(unix) {
      to.touched = true;
      if (from && from.options && from.options.maxDate != unix) {
        var cachedValue = from.getState().selected.unixDate;
        from.options = {
          maxDate: unix
        };
        if (from.touched) {
          from.setDate(cachedValue);
        }
      }
    }
  });
  from = $(".datepicker10").persianDatepicker({
    altField: '.datepicker10-alt',
    altFormat: 'LLLL',
    initialValue: false,
    onSelect: function(unix) {
      from.touched = true;
      if (to && to.options && to.options.minDate != unix) {
        var cachedValue = to.getState().selected.unixDate;
        to.options = {
          minDate: unix
        };
        if (to.touched) {
          to.setDate(cachedValue);
        }
      }
    }
  });
</script>

</body>

</html>
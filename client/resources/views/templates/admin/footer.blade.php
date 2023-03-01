<!-- Footer -->
<footer class="content-footer footer bg-footer-theme">
    <div class="container-xxl d-flex flex-wrap justify-content-between py-2 flex-md-row flex-column">
        <div class="mb-2 mb-md-0">
            ©
            <script>
                document.write(new Date().getFullYear())
            </script>
            , made with ❤️ by <a href="https://themeselection.com" target="_blank"
                class="footer-link fw-bolder">ThemeSelection</a>
        </div>
        <div>

            <a href="https://themeselection.com/license/" class="footer-link me-4" target="_blank">License</a>
            <a href="https://themeselection.com/" target="_blank" class="footer-link me-4">More
                Themes</a>

            <a href="https://demos.themeselection.com/sneat-bootstrap-html-admin-template/documentation/"
                target="_blank" class="footer-link me-4">Documentation</a>


            <a href="https://themeselection.com/support/" target="_blank"
                class="footer-link d-none d-sm-inline-block">Support</a>

        </div>
    </div>
</footer>
<!-- / Footer -->


<div class="content-backdrop fade"></div>
</div>
<!--/ Content wrapper -->
</div>

<!--/ Layout container -->
</div>

</div>

<!--/ Layout wrapper -->

<!-- Core JS -->
<!-- build:js assets/vendor/js/core.js -->
<script src="{{ asset('assets/admin/') }}/assets/vendor/libs/jquery/jquery.js"></script>
<script src="{{ asset('assets/admin/') }}/assets/vendor/libs/popper/popper.js"></script>
<script src="{{ asset('assets/admin/') }}/assets/vendor/js/bootstrap.js"></script>
<script src="{{ asset('assets/admin/') }}/assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js"></script>

<script src="{{ asset('assets/admin/') }}/assets/vendor/libs/hammer/hammer.js"></script>
<script src="{{ asset('assets/admin/') }}/assets/vendor/libs/i18n/i18n.js"></script>
<script src="{{ asset('assets/admin/') }}/assets/vendor/libs/typeahead-js/typeahead.js"></script>

<script src="{{ asset('assets/admin/') }}/assets/vendor/js/menu.js"></script>
<!-- endbuild -->

<!-- Vendors JS -->
<script src="{{ asset('assets/admin/') }}/assets/vendor/libs/apex-charts/apexcharts.js"></script>

<!-- Main JS -->
<script src="{{ asset('assets/admin/') }}/assets/js/main.js"></script>

<!-- Page JS -->
<script src="{{ asset('assets/admin/') }}/assets/js/dashboards-analytics.js"></script>
@stack('scripts')

</body>

</html>

<!-- beautify ignore:end -->

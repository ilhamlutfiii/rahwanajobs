<footer id="footer" class="footer">
  <div class="container">
    @if(isset($settings) && $settings->isNotEmpty())
      @php $setting = $settings->first(); @endphp
      <div class="social-links d-flex justify-content-start">
        <a href="{{ $setting->twitter }}" target="_blank" ><i class="bi bi-twitter"></i></a>
        <a href="{{ $setting->facebook }}" target="_blank" ><i class="bi bi-facebook"></i></a>
        <a href="{{ $setting->instagram }}" target="_blank" ><i class="bi bi-instagram"></i></a>
      </div>
      <div class="copyright text-start mt-2">
        <p>© <strong class="px-1 sitename">Rahwana Jobs</strong> <span>Copyright</span></p>
      </div>
    @else
      <p>Social links are not available.</p>
    @endif
  </div>
</footer>

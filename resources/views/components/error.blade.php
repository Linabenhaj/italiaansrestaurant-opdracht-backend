@props(['field'])

@error($field)
  <div style="color:#c00; margin-top:.25rem; font-size:.875rem;">
    {{ $message }}
  </div>
@enderror

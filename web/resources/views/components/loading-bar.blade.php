<link href="/css/loadingbar.css" rel="stylesheet" type="text/css">
<iframe id="tempIframe" name="tempIframe" style="display: none;"></iframe>

<input type="hidden" id="_token" value="{{csrf_token()}}">

<div class="loading-main" id="loading-main" style="display: none;">
    <div class="loading-container">
        <div class="loading" style="border-radius: 100% !important;"></div>
        <div id="loading-text">loading</div>
    </div>
</div>

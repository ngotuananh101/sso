<div id="google_translate_element"></div>

<script type="text/javascript">
    function googleTranslateElementInit() {
        new google.translate.TranslateElement({
            pageLanguage: 'en'
        }, 'google_translate_element');

        // Use MutationObserver to detect when the select element is added
        const observer = new MutationObserver(function () {
            const selectElement = document.querySelector('.goog-te-combo');
            if (selectElement) {
                selectElement.classList.add('form-select', 'py-2');
                observer.disconnect();
            }
        });

        observer.observe(document.getElementById('google_translate_element'), {
            childList: true,
            subtree: true
        });
    }
</script>

<script type="text/javascript"
        src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>

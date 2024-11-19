Statamic.booting(() => {
    console.log('Statamic CP booting...');

    const interval = setInterval(() => {
        const toolbar = document.querySelector('.data-list-bulk-actions'); // Toolbar selector
        if (toolbar) {
            clearInterval(interval); // Stop checking once the toolbar is found

            // Create the custom Bulk Edit button
            const button = document.createElement('button');
            button.className = 'btn btn-primary'; // Statamic-styled button
            button.textContent = 'Bulk Edit';
            button.onclick = () => {
                // Gather selected assets
                const selectedAssets = Array.from(
                    document.querySelectorAll('tr.sortable-row input[type="checkbox"]:checked') // Updated selector for checked rows
                ).map((checkbox) => checkbox.value); // Get the value from the checkbox

                console.log('Selected Assets:', selectedAssets); // Debug selected assets

                if (selectedAssets.length === 0) {
                    alert('No assets selected!');
                    return;
                }

                // Build query string
                const query = selectedAssets.map((path) => `ids[]=${encodeURIComponent(path)}`).join('&');

                // Redirect to the bulk edit page
                window.location.href = `/cp/bulk-edit-assets?${query}`;
            };

            // Append the button to the toolbar
            toolbar.appendChild(button);
        }
    }, 500); // Check every 500ms until the toolbar is available
});

Statamic.booting(() => {
    console.log('Statamic CP booting...');

    // Inject the Bulk Edit button into the toolbar
    const interval = setInterval(() => {
        const toolbar = document.querySelector('.data-list-bulk-actions'); // Correct toolbar selector
        if (toolbar) {
            clearInterval(interval); // Stop checking once the toolbar is found

            // Create the custom Bulk Edit button
            const button = document.createElement('button');
            button.className = 'btn btn-primary'; // Statamic-styled button
            button.textContent = 'Bulk Edit';
            button.onclick = () => {
                // Gather selected assets
                const selectedAssets = Array.from(
                    document.querySelectorAll('[data-selected="true"]') // Replace with actual selector for selected assets
                ).map((asset) => asset.getAttribute('data-path')); // Adjust if needed for the asset's path

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

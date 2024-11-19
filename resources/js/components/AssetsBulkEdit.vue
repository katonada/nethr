<template>
    <div v-if="selectedAssets.length > 0" class="flex items-center space-x-2">
        <button class="btn-primary" @click="goToBulkEdit">
            Bulk Edit Selected
        </button>
    </div>
</template>

<script>
export default {
    data() {
        return {
            selectedAssets: [],
        };
    },
    methods: {
        goToBulkEdit() {
            // Create a query string with selected asset IDs
            const query = this.selectedAssets
                .map((id) => `ids[]=${id}`)
                .join("&");
            this.$router.push(`/bulk-edit-assets?${query}`);
        },
    },
    created() {
        // Listen for asset selection changes
        this.$root.$on("assets-selected", (assets) => {
            this.selectedAssets = assets.map((asset) => asset.id);
        });
    },
};
</script>

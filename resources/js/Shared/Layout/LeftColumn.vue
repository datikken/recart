<template>

    <div class="left_column" data-margin-top="80">
        <Filters />
        <Viewed />
    </div>

</template>

<script>
    import Filters from '@/Shared/Filters/Filters';
    import Viewed from '@/Shared/Viewed/Viewed';

    export default {
        name: "LeftColumn",
        components: {
            Filters,
            Viewed,
        }
    }
</script>

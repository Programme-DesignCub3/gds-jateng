<template>
    <div class="logo-container">
        <img
            draggable="false"
            src="/assets/images/logo.png"
            alt="Logo"
        />
        <img
            draggable="false"
            src="/assets/images/gds.png"
            alt="GDS Logo"
        />
    </div>
</template>

<style scoped>
.logo-container {
    display: flex;
    flex-direction: column;
    gap: 1rem;
    align-items: center;
}

.logo-container img {
    max-width: 80%;
    height: auto;
}
</style>

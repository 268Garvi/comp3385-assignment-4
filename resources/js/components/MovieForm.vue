<template>
    <form @submit.prevent="saveMovie" id="movieForm">
        <div class="form-group mb-3">
            <label for="title" class="form-label">Movie Title</label>
            <input type="text" id="title" name="title" class="form-control" required />
        </div>
        <div class="form-group mb-3">
            <label for="description" class="form-label">Description</label>
            <textarea id="description" name="description" class="form-control" required></textarea>
        </div>
        <div class="form-group mb-3">
            <label for="poster" class="form-label">Poster</label>
            <input type="file" id="poster" name="poster" class="form-control" required />
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</template>

<script setup>
const saveMovie = async () => {
    const form_data = new FormData(document.getElementById('movieForm'));
    const headers = { 'Accept': 'application/json','Authorization': 'Bearer ' + localStorage.getItem('token') };
    const response = await fetch('/api/v1/movies', {
        method: 'POST',
        headers,
        body: form_data
    });
    const data = await response.json();
    console.log(data);
}
</script>

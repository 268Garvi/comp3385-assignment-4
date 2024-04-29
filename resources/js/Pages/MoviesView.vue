<script setup>
import { ref, onMounted } from 'vue';
let movies = ref([]);
const fetchMovies = async () => {
    try {
        const response = await fetch('/api/v1/movies', {
            method: 'GET',
            headers: { 'Accept': 'application/json', 'Authorization': 'Bearer ' + localStorage.getItem('token') }
        });
        if (response.ok) {
            const data = await response.json();
            movies.value = data.movies;
            console.log(data);
        } else {
            throw new Error('Failed to fetch movies');
        }
    } catch (error) {
        console.error('Error:', error);
    }
};
onMounted(fetchMovies);
</script>

<template>
    <div class="container">
        <h1>Movies</h1>
        <div class="row">
            <div class="col" v-for="movie in movies" :key="movie.id">
                <div class="card mb-3" style="max-width: 540px;">
                    <div class="row g-0">
                        <div class="col-md-4">
                            <img :src="'/storage/' + movie.poster" class="img-fluid rounded-start" alt="Movie Poster" style="height: 100%; object-fit: cover;">
                        </div>
                        <div class="col-md-8">
                            <div class="card-body">
                                <h5 class="card-title">{{ movie.title }}</h5>
                                <p class="card-text">{{ movie.description }}</p>
                                <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

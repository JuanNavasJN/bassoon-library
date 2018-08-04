<template>
  <div id="app">
    <v-app > 
        <v-content>
            <v-card>
                <v-card class="indigo" dark>
                    <v-card-title>
                    <h2>Bassoon Library</h2>   
                    <v-spacer></v-spacer>
                    <v-text-field
                        v-model="search"
                        append-icon="search"
                        label="Search"
                        single-line
                        hide-details
                    ></v-text-field>
                    </v-card-title>
                </v-card>
                <v-data-table
                :headers="headers"
                :items="parts"
                :search="search"
                hide-actions
                >
                <template slot="items" slot-scope="props">
                    <td>{{ props.item.title }}</td>
                    <td>{{ props.item.composer }}</td>
                    <td><a :href="props.item.url" target="_blank">link</a></td>
                </template>
                <v-alert slot="no-results" :value="true" color="error" icon="warning">
                    Your search for "{{ search }}" found no results.
                </v-alert>
                </v-data-table>
            </v-card>
          </v-content>
          <v-footer class="pa-3">
                <div>Thanks <a href="http://fagotizm.narod.ru/index-eng.html" target="_blank">fagotizm.narod.ru</a></div>
                <v-spacer></v-spacer>
                <div>&copy; {{ new Date().getFullYear() }}</div>
          </v-footer>
    </v-app>
  </div>
</template>

<script>
import { collection } from './assets/collection.js';

export default {
  name: 'app',
  data () {
    return {
      search: '',
      headers: [
      { text: 'Title', value: 'title' },
      { text: 'Composer', value: 'composer' },
      { text: 'Download', value: 'url', sortable: false, },
      ],
      parts: collection
    }
  }
}
</script>

<style>
.loading {
    display: none;
}
</style>

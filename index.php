<!DOCTYPE html>
<html>
<head>
    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-122836822-1"></script>
    <script>
    window.dataLayer = window.dataLayer || [];
    function gtag(){dataLayer.push(arguments);}
    gtag('js', new Date());

    gtag('config', 'UA-122836822-1');
    </script>

  <title>Bassoon Library</title>
  <link href='https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Material+Icons' rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/vuetify/dist/vuetify.min.css" rel="stylesheet">
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no, minimal-ui">
  <script src="https://cdn.jsdelivr.net/npm/vue/dist/vue.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/vuetify/dist/vuetify.js"></script>
</head>
<body>
  <div id="app">
    <v-app>
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
 
  <script type="module"> 
    import { collection } from './collection.js';
    
    var app = new Vue({ 
        el: '#app',
        data: {
            search: '',
            headers: [
            { text: 'Title', value: 'title' },
            { text: 'Composer', value: 'composer' },
            { text: 'Download', value: 'url', sortable: false, },
            ],
            parts: collection
        }
    });

  </script>
</body>
</html>
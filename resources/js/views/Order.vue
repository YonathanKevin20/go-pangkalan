<template>
	<div>
		<div class="form-group">
			<label>From</label>
			<div class="row">
				<div class="col-md-10">
					<gmap-autocomplete class="form-control"
						@place_changed="setPlace" v-model="form.lat_from"></gmap-autocomplete>
				</div>
				<div class="col-md-2">
					<button class="btn btn-primary" @click="addMarker">Add</button>
				</div>
			</div>
		</div>
		<div class="form-group">
			<label>To</label>
			<div class="row">
				<div class="col-md-10">
					<gmap-autocomplete class="form-control"
						@place_changed="setPlace" v-model="form.lat_from"></gmap-autocomplete>
				</div>
				<div class="col-md-2">
					<button class="btn btn-primary" @click="addMarker">Add</button>
				</div>
			</div>
		</div>
		<form @submit.prevent="saveForm" @keydown="form.onKeydown($event)">
			<div class="form-group">
				<button class="btn btn-success">Create</button>
			</div>
		</form>

		<gmap-map style="width: 100%; height: 400px"
			:center="maps.center"
			:zoom="9"
			:map-type-id="'roadmap'">
			<gmap-marker
				:key="index"
				v-for="(m, index) in maps.markers"
				:position="m.position"
				@click="center=m.position"></gmap-marker>
		</gmap-map>

	</div>
</template>

<script>
	import Vue from "vue"
	import Form from 'vform'
	import * as VueGoogleMaps from 'vue2-google-maps'

	Vue.use(VueGoogleMaps, {
  	load: {
    	key: "AIzaSyCIfPdwpmU74YdRLcOKoD0ZmjVpZlxdACg",
    	libraries: "places"
  	}
	});

	export default {
		props: ['clientId'],
		data: function() {
			return {
				form: new Form({
					client_id: this.clientId,
					driver_id: '',
					lat_from: '',
					lng_from: '',
					lat_to: '',
					lng_to: '',
					status: 'p',
				}),
				maps: {
					center: {
						lat: -6.921576,
						lng: 107.4472154
					},
					markers: [],
					places: [],
					currentPlace: null
				}
			}
		},
		mounted() {
			this.geolocate();
		},
		methods: {
			setPlace(place) {
				this.maps.currentPlace = place;
			},
			addMarker() {
				if(this.maps.currentPlace) {
					const marker = {
						lat: this.maps.currentPlace.geometry.location.lat(),
						lng: this.maps.currentPlace.geometry.location.lng()
					};
					this.maps.markers.push({ position: marker });
					this.maps.places.push(this.maps.currentPlace);
					this.maps.center = marker;
					this.maps.currentPlace = null;
				}
			},
			geolocate: function() {
				navigator.geolocation.getCurrentPosition(position => {
					this.maps.center = {
						lat: position.coords.latitude,
						lng: position.coords.longitude
					};
				});
			},
			saveForm: function() {
				this.form.post('/api/order')
					.then(function(resp) {
						alert(resp.statusText);
					})
			}
		}
	}
</script>
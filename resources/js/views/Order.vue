<template>
	<div>
		<form @submit.prevent="saveForm">
			<div class="form-group">
				<label>From</label>
				<input type="text" v-model="form.lat_from" class="form-control">
			</div>
			<div class="form-group">
				<label>To</label>
				<input type="text" v-model="form.lat_to" class="form-control">
			</div>
			<div class="form-group">
				<button class="btn btn-success">Create</button>
			</div>
		</form>
	</div>
</template>

<script>
	import Form from 'vform'

	export default {
		props: ['clientId'],
		data: function() {
			return {
				form: new Form({
					client_id: this.clientId,
					driver_id: '',
					lat_from: '',
					long_from: '',
					lat_to: '',
					long_to: '',
					status: 'p',
				})
			}
		},
		methods: {
			saveForm: function() {
				this.form.post('/api/order')
					.then(function(resp) {
						alert(resp.statusText);
					})
			}
		}
	}
</script>
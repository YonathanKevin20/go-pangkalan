<template>
	<div>
		<h1>GO-Pangkalan</h1>
		<p>
			<router-link :to="{ name: 'order' }">Order</router-link> |
			<router-link :to="{ name: 'hello' }">History</router-link>
		</p>

		<router-view :client-id="clientId"></router-view>
	</div>
</template>

<script>
	export default {
		props: ['clientId']
	}
</script>
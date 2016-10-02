function TestService($resource) {
	return $resource('/api/test');
}

export { TestService }
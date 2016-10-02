function NotebooksFactory($resource) {
	return $resource('/api/notebooks/:slug');
}

export { NotebooksFactory }
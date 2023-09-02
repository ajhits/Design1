function dfs(graph, start) {
    const visited = {};
    const stack = [start];
    const result = [];
  
    while (stack.length !== 0) {
      const node = stack.pop();
      if (!visited[node]) {
        visited[node] = true;
        result.push(node);
        graph[node].forEach(neighbour => {
          stack.push(neighbour);
        });
      }
    }
    return result;
  }

  
  
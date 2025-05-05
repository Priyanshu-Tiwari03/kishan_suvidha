<!DOCTYPE html>
<html>
<head>
    <title>Categories PDF</title>
</head>
<body>
    <h1>Categories List</h1>

    <table border="1" width="100%" cellpadding="5">
        <thead>
            <tr>
                <th>ID</th>
                <th>Parent_id</th>
                <th>Image</th>
                <th>Name</th>
                <th>Description
                <th>Created At</th>
                
                
            </tr>
        </thead>
        <tbody>
            @foreach($categories as $category)
                <tr>
                    <td>{{ $category->id }}</td>
                    <td>{{ $category->parent_id }}</td>
                    <td>{{ $category->name }}</td>
                    <td>{{ $category->description }}</td>
                    <td>{{ $category->created_at }}</td>
                    
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>

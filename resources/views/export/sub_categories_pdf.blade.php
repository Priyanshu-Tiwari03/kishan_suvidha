<!DOCTYPE html>
<html>
<head>
    <title>Sub-Categories PDF</title>
</head>
<body>
    <h1>Sub-Categories List</h1>

    <table border="1" width="100%" cellpadding="5">
        <thead>
            <tr>
                <th>ID</th>
                <th>Category_id</th>
                <th>Name</th>
                <th>Description
                <th>Created At</th>
                
                
            </tr>
        </thead>
        <tbody>
            @foreach($sub_categories as $subcategory)
                <tr>
                    <td>{{ $subcategory->id }}</td>
                    <td>{{ $subcategory->category_id }}</td>
                    <td>{{ $subcategory->name }}</td>
                    <td>{{ $subcategory->description }}</td>
                    <td>{{ $subcategory->created_at }}</td>
                
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>

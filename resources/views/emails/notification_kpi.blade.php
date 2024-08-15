<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Notification KPI</title>
</head>
<body>
<p>This is a reminder that the number of posts today is <strong>{{$articlesPost->count()}}</strong> which below the daily KPI target. Here are the posts made today:</p>
<ul>
    @foreach($articlesPost as $article)
        <li>{{ $article->link }} - Posted on: {{ $article->push_date }}</li>
    @endforeach
</ul>
<p>Daily KPI Target: <strong>{{ $kpiPostPerDay }}</strong> posts</p>
<p>Please ensure to meet the daily posting target.</p>
</body>
</html>

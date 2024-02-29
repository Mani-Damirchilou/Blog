@extends('layouts.panel')
@section('subtitle','مقالات > لیست همه')
@section('header')
    <span class="fs-6">مقالات > لیست همه</span>

    @can('ساخت مقاله')
        <a href="{{route('articles.create')}}" data-bs-toggle="tooltip" data-bs-title="مقاله جدید" class="btn btn-sm rounded-3 btn btn-primary"><i class="bi bi-plus "></i></a>
    @endcan
@endsection
@section('card-header')
    لیست مقالات
@endsection
@section('card-body')
    @if($articles->isEmpty())
        <div class="d-flex flex-column justify-content-center align-items-center gap-3 fs-5">
            هنوز هیچ مقاله ای به انتشار نرسیده است !
            @can('ساخت مقاله')
                <a href="{{route('articles.create')}}" class="btn btn-primary">
                    ساخت مقاله
                </a>
            @endcan
        </div>
    @endif
@endsection
@section('table',$articles->isEmpty() ? "d-none" : '')
@section('table-head')
    <th>#</th>
    <th>عنوان</th>
    <th>سریال</th>
    <th>نویسنده</th>
    <th>دسته بندی</th>
    <th>برچسب (ها)</th>
    <th>
        <i class="bi bi-hand-thumbs-up"></i>
    </th>
    <th>
        <i class="bi bi-hand-thumbs-down"></i>
    </th>
    <th>
        <i class="bi bi-eye"></i>
    </th>
    <th>وضعیت</th>
    <th>عکس بند انگشتی</th>
    <th>تاریخ انتشار</th>
    <th>تاریخ آخرین ویرایش</th>
    <th>اقدامات</th>
@endsection
@section('table-body')
    @foreach($articles as $article)
        <tr class="align-middle">
            <td>{{$article->id}}</td>
            <td>{{$article->title}}</td>
            <td>{{$article->slug}}</td>
            <td>{{$article->user->name}}</td>
            <td>{{$article->category->name ?? '-'}}</td>
            <td>
                @if(!$article->tags->isEmpty())
                    {{implode(' , ',$article->tags->pluck('name')->toArray())}}
                @else
                    -
                @endif
            </td>
            <td>
                {{$article->getLikesCount()}}
            </td>
            <td>
                {{$article->getDisLikesCount()}}
            </td>
            <td>
                {{$article->getViewsCount()}}
            </td>
            <td class="text-{{$article->active ? 'success' : 'danger'}}">{{$article->active ? 'قابل مشاهده' : 'غیرقابل مشاهده'}}</td>
            <td><a class="text-decoration-none" href="{{$article->thumbnail}}">
                    <i class="bi bi-eye"></i>
                    مشاهده
                </a></td>
            <td>{{$article->created_at_to_persian}}</td>
            <td>{{$article->updated_at_to_persian}}</td>
            <td class="">
               <div class="d-flex justify-content-center gap-2">
                   @if($article->active)
                   <a href="{{route('articles.show',$article->slug)}}" class="btn btn-info btn-sm">
                       <i class="bi bi-eye"></i>
                   </a>
                   @endif
                   @can('ویرایش مقاله')
                       <a href="{{route('articles.edit',$article->id)}}" class="btn btn-sm btn-outline-primary"><i class="bi bi-pencil-square"></i></a>
                   @else
                       -
                   @endcan
                   @can('حذف مقاله')
                       <a href="{{route('articles.delete',$article->id)}}" class="btn btn-sm btn-danger"><i class="bi bi-trash"></i></a>
                   @else
                       -
                   @endcan

               </div>
            </td>
        </tr>
    @endforeach
@endsection
@section('card-footer-classes')
    @if(!$articles->hasPages())
        d-none
    @endif
    justify-content-center d-flex align-items-center
@endsection
@section('card-footer-attributes')
    dir="ltr"
@endsection
@section('card-footer')
{{$articles->links()}}
@endsection

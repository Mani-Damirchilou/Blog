@extends('layouts.panel')
@section('header')
    <span class="fs-6">مقالات > لیست همه</span>
    @can('ساخت مقاله')
        <a href="{{route('articles.create')}}" data-bs-toggle="tooltip" data-bs-title="مقاله جدید" class="btn btn-sm rounded-3 btn btn-primary"><i class="bi bi-plus "></i></a>
    @endcan
@endsection
@section('content')
    <div class="card">
        <div class="card-header fs-4">
            لیست مقالات
        </div>
        <div class="card-body table-responsive">
            @if($articles->isEmpty())
                <div class="d-flex flex-column justify-content-center align-items-center fs-5 gap-4">
                <span>
                هیچ مقاله ای ثبت نشده است !
                </span>
                    @can('ساخت مقاله')
                        <a href="{{route('articles.create')}}"  class="btn rounded-3 btn btn-primary">ساخت مقاله</a>
                    @endcan
                </div>
            @else
                <table class="table text-center table-hover">
                    <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">عنوان</th>
                        <th scope="col">سریال</th>
                        <th scope="col">نویسنده</th>
                        <th scope="col">دسته بندی</th>
                        <th scope="col">برچسب (ها)</th>
                        <th scope="col">پسندیده شده</th>
                        <th scope="col">پسندیده نشده</th>
                        <th scope="col">وضعیت</th>
                        <th scope="col">عکس بند انگشتی</th>
                        <th scope="col">تاریخ انتشار</th>
                        <th scope="col">تاریخ آخرین ویرایش</th>
                        <th scope="col">اقدامات</th>
                    </tr>
                    </thead>
                    <tbody class="table-group-divider">

                    @foreach($articles as $article)
                        <tr>
                            <th>{{$article->id}}</th>
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
                                {{$article->likes->where('vote',1)->count()}}
                                <i class="bi bi-hand-thumbs-up"></i>
                            </td>
                            <td>
                                {{$article->likes->where('vote',-1)->count()}}
                                <i class="bi bi-hand-thumbs-down"></i>

                            </td>
                            <td class="text-{{$article->active ? 'success' : 'danger'}}">{{$article->active ? 'قابل مشاهده' : 'غیرقابل مشاهده'}}</td>
                            <td><a href="{{$article->thumbnail}}">مشاهده</a></td>
                            <td>{{$article->created_at_to_persian}}</td>
                            <td>{{$article->updated_at_to_persian}}</td>
                            <td class="d-flex gap-2 justify-content-center">
                                @can('ویرایش مقاله')
                                    <a href="{{route('articles.edit',$article->id)}}" class="btn btn-sm btn-outline-primary"><i class="bi bi-pencil-square"></i></a>
                                @else
                                    -
                                @endcan
                                @can('حذف مقاله')
                                    <a href="{{route('articles.delete',$article->id)}}" class="btn btn-sm btn-outline-danger"><i class="bi bi-trash"></i></a>
                                @else
                                    -
                                @endcan
                            </td>
                        </tr>
                    @endforeach

                    </tbody>
                </table>
            @endif
        </div>
        @if($articles->hasPages())
            <div class="card-footer d-flex justify-content-center " dir="ltr">
                {{$articles->links()}}
            </div>
        @endif
    </div>
@endsection

<?php

namespace App\Http\Controllers;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\Post;

class PostController extends Controller
{
    public function index()
    {  
        $posts = Post::latest()->get();
        return view('posts.index', compact('posts'),[
            'title'=>'Daftar',
            'judul'=>'Daftar Problem'
        ]);
    }

    public function beranda()
    {
        $posts = Post::latest()->get();
        return view('index',compact('posts'),[
            'title'=>'Beranda',
            'judul'=>'Beranda'
        ]);
    }

    public function detil_problems(Post $posts, $slug)
    {
        $posts = Post::where('slug', $slug)->first();
        return view('posts.detil', compact('posts'),[
            'title'=>'Detil Problem',
            'judul'=>'Detil Problem',
            'posts'=>$posts,
        ]);
    }

    public function show()
    {
        $posts = Post::latest()->get();
        return view('posts.index', compact('posts'),[
            'title'=>'Daftar',
            'judul'=>'Daftar Problem'
        ]);
    }
    public function create()
    {
        // $posts->update([
        //     'title' => $request->title,
        //     'content' => $request->content,
        //     'status' => $request->status,
        //     'slug' => Str::slug($request->title)
        // ]);

        return view('posts.create',[
            'title'=>'Tambah',
            'judul'=>'Tambah Problem'
        ]);
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required|string|max:155',
            'content' => 'required',
            'status' => 'required',
            'penulis' => 'required',
            'pdf'=>'file|mimetypes:pdf|max:2048',
        ]);
        $post = new Post();
        $post->pdf = $request->pdf;
        $post->sound1 = $request->sound1;
        $post->sound2 = $request->sound2;
        $post->sound3 = $request->sound3;

        $post = Post::create([
            'title' => $request->title,
            'content' => $request->content,
            'status' => $request->status,
            'pdf' => $request->pdf,
            'slug' => Str::slug($request->title),
            'penulis' => $request->penulis,
            'deskripsi' => $request->deskripsi,
            'sound1' => $request->sound1,   
            'sound2' => $request->sound2,   
            'sound3' => $request->sound3,
            'video1' => $request->video1,   
            'video2' => $request->video2,   
            'video3' => $request->video3,   
   
        ]);
        //pdf
        if ($post->pdf != null)
        {
            $filepdf = $post->id.'_'.$post->title.'.'.$request->file('pdf')->getClientOriginalExtension();
            $request->file('pdf')->move('uploads',$filepdf);
            $post->pdf = $filepdf;
        }
        
        //sound1
        if ($post->sound1 != null){
            $filesound1 = $post->id.'_'.$post->title.'1'.'.'.$request->file('sound1')->getClientOriginalExtension();
            $request->file('sound1')->move('uploads/sound/',$filesound1);
            $post->sound1 = $filesound1;
        }
        
        //sound2
        if ($post->sound2 != null)
        {
            $filesound2 = $post->id.'_'.$post->title.'2'.'.'.$request->file('sound2')->getClientOriginalExtension();
            $request->file('sound2')->move('uploads/sound/',$filesound2);
            $post->sound2 = $filesound2;
        }
        
        //sound3
        if ($post->sound3 != null)
        {
            $filesound3 = $post->id.'_'.$post->title.'3'.'.'.$request->file('sound3')->getClientOriginalExtension();
            $request->file('sound3')->move('uploads/sound/',$filesound3);
            $post->sound3 = $filesound3;
        }
        
        //save
        $post->save();

        if ($post) {
            return redirect()
                ->route('post.index')
                ->with([
                    'success' => 'New post has been created successfully'
                ]);
        } else {
            return redirect()
                ->back()
                ->withInput()
                ->with([
                    'error' => 'Some problem occurred, please try again'
                ]);
        }
    }

    public function edit($id)
    {
        $post = Post::findOrFail($id);
        return view('posts.edit', compact('post'),[
            'title'=>'Ubah',
            'judul'=>'Ubah Problem'
        ]);
    }

    protected function getFileType($path) {

		$pdf_extensions = ['pdf'];
		$info = pathinfo($path);
		$fileType = $info['extension'];

		if(in_array($fileType, $pdf_extensions))
		{
		    return 'pdf';
		}

		return 'other';
	}

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'title' => 'required|string|max:155',
            'content' => 'required',
            'status' => 'required',
            'pdf'=>'file|mimetypes:pdf|max:2048',
        ]);
        $post = new Post();
        $post->pdf = $request->pdf;
        $post->sound1 = $request->sound1;
        $post->sound2 = $request->sound2;
        $post->sound3 = $request->sound3;

        $post = Post::findOrFail($id);

        $post->update([
            'title' => $request->title,
            'content' => $request->content,
            'status' => $request->status,
            'pdf' => $request->pdf,
            'slug' => Str::slug($request->title),

            'penulis' => $request->penulis,
            'deskripsi' => $request->deskripsi,
            'sound1' => $request->sound1,   
            'sound2' => $request->sound2,   
            'sound3' => $request->sound3,  

            'video1' => $request->video1,   
            'video2' => $request->video2,   
            'video3' => $request->video3,   

        ]);
        //pdf
        if($post->pdf != null)
        {
            $filepdf = $post->id.'_'.$post->title.'.'.$request->file('pdf')->getClientOriginalExtension();
            $request->file('pdf')->move('uploads',$filepdf);
            $post->pdf = $filepdf;
        }
        $filepdf = storage_path().'uploads/'.$post->pdf;
        $filetype=$post->getFileType($filepdf);

        // return view('view-name', compact('goal', 'filePath', 'fileType'));
        //sound1
        if($post->sound1 != null)
        {
            $filesound1 = $post->id.'_'.$post->title.'1'.'.'.$request->file('sound1')->getClientOriginalExtension();
            $request->file('sound1')->move('uploads/sound/',$filesound1);
            $post->sound1 = $filesound1;
        }
        //sound2
        if($post->sound2 != null)
        {
            $filesound2 = $post->id.'_'.$post->title.'2'.'.'.$request->file('sound2')->getClientOriginalExtension();
            $request->file('sound2')->move('uploads/sound/',$filesound2);
            $post->sound2 = $filesound2;
        }
        //sound3
        if($post->sound3 != null)
        {
            $filesound3 = $post->id.'_'.$post->title.'3'.'.'.$request->file('sound3')->getClientOriginalExtension();
            $request->file('sound3')->move('uploads/sound/',$filesound3);
            $post->sound3 = $filesound3;
        }
        
        return view('edit', compact('posts', 'filepdf', 'fileType'));
       
        $post->save();

        if ($post) {
            return redirect()
                ->route('post.index')
                ->with([
                    'success' => 'Post has been updated successfully'
                ]);
        } else {
            return redirect()
                ->back()
                ->withInput()
                ->with([
                    'error' => 'Some problem has occured, please try again'
                ]);
        }
    }

    public function destroy($id)
    {
        $post=Post::findOrFail($id);
        $post->delete();

        if($post)
        {
            return redirect()
            ->route('post.index')
            ->with([
                'success' => 'Post has been deleted successfully'
            ]);
        }
        else
        {
            return redirect()
            ->route('post.index')
            ->with([
                'error' => 'Some problem has occured, please try again'
            ]);
        }
    }

    public function search(Request $request)
    {
        if ($request->ajax()) {
            $data = Post::where('id','like','%'.$request->search,'%')
                ->orwhere('title', 'like', '%', $request->search, '%')
                ->orwhere('content', 'like', '%', $request->search, '%')->get();

            $output = '';

            if (count($data) > 0) {
                $output = '
                <table class="table">
                <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">title</th>
                    <th scope="col">content</th>
                </tr>
                </thead>
                <tbody>';
                foreach ($data as $row) {
                    $output .= '
                <tr>
                    <td>'.$row->id.'</td>
                    <td>'.$row->title.'</td>
                    <td>'.$row->content.'</td>
                </tr>
                ';
                }
                $output = '
            </tbody>
            </table>';
            }

            else
            {
                $output='No Results';
            }
            return $output;
        }
    }
}

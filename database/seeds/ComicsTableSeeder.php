<?php

use App\Comic;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Validation\Rules\Unique;

class ComicsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $comics = config('comics');
        foreach($comics as $comic){
            $new_comic = new Comic();
            $new_comic->title = $comic['title'];
            $new_comic->description = $comic['description'];
            $new_comic->image = $comic['thumb'];
            $new_comic->price = $comic['price'];
            $new_comic->series = $comic['series'];
            $new_comic->sale_date = $comic['sale_date'];
            $new_comic->type = $comic['type'];
            $new_comic->slug = $this->getUniqueSlug($new_comic->title);
            $new_comic->save();
        }
    }


    private function getUniqueSlug($title)
    {
        
        $slug = Str::slug($title, '-');
        
        $count = 2;
        while (Comic::where('slug', $slug)->exists()) {

            $slug = $slug . '-' . $count++;
        }

        return $slug;

        
    }
}

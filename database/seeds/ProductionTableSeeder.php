<?php

use Illuminate\Database\Seeder;

class ProductionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('rp_production')->insert([
            'name'          =>  '求实BBS',
            'description'   =>  '天大自由的交友空间，毕业校友的聚集胜地，沟通校务的有效平台',
            'slogan'        =>  '结识天大人，畅议天下事',
            'picId'           =>  1,
        ]);
        DB::table('rp_production')->insert([
            'name'          =>  '微北洋',
            'description'   =>  '集新闻阅读、GPA查询、自习室查询、校园公告、失物招领等功能为一体的功能APP',
            'slogan'        =>  '学在北洋，一手掌握',
            'picId'           =>  1
        ]);
        DB::table('rp_production')->insert([
            'name'          =>  '问津',
            'description'   =>  '比贴吧更严谨，比知乎更懂天大。这是一个天大师生的校内优质问答社区',
            'slogan'        =>  '寻师讲道，一手掌握',
            'picId'           =>  1
        ]);
    }
}

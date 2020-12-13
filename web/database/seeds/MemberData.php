<?php

namespace Database\Seeders;

use App\Model\Member;
use Illuminate\Database\Seeder;

class MemberData extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $testData = $this->testData();

        foreach ($testData as $dataRow) {
            $member           = new Member();
            $member->Name     = $dataRow['name'];
            $member->AddrNum  = 38712;
            $member->Addr1    = $dataRow['addr1'];
            $member->Addr2    = $dataRow['addr2'];
            $member->IsMember = 0;
            $member->Hp       = $dataRow['hp'];
            $member->save();
        }
    }

    private function testData(): array
    {
        return [
            0  => [
                'name'  => '서팔광',
                'hp'    => '01058391742',
                'addr1' => '경기 부천시 원미로144번길 51',
                'addr2' => '101동 203호'
            ],
            1  => [
                'name'  => '김덕협',
                'hp'    => '01057382423',
                'addr1' => '서울 영등포구 여의대방로43라길 9',
                'addr2' => '702동 802호',
            ],
            2  => [
                'name'  => '김철수',
                'hp'    => '01057483295',
                'addr1' => '서울 영등포구 국제금융로7길 32',
                'addr2' => '402동 502호',
            ],
            3  => [
                'name'  => '김덕협',
                'hp'    => '01088749232',
                'addr1' => '경기 부천시 원미로144번길 51',
                'addr2' => '101동 203호'
            ],
            4  => [
                'name'  => '유덕창',
                'hp'    => '01012949921',
                'addr1' => '서울 영등포구 여의대방로43라길 9',
                'addr2' => '702동 802호',
            ],
            5  => [
                'name'  => '가원창',
                'hp'    => '01075832343',
                'addr1' => '서울 영등포구 국제금융로7길 32',
                'addr2' => '402동 502호',
            ],
            6  => [
                'name'  => '박효신',
                'hp'    => '01089895521',
                'addr1' => '서울 영등포구 여의대방로43라길 9',
                'addr2' => '702동 802호',
            ],
            7  => [
                'name'  => '이지은',
                'hp'    => '01042859200',
                'addr1' => '경기 부천시 원미로144번길 51',
                'addr2' => '101동 203호'
            ],
            8  => [
                'name'  => '김창덕',
                'hp'    => '01012124545',
                'addr1' => '서울 영등포구 여의대방로43라길 9',
                'addr2' => '702동 802호',
            ],
            9  => [
                'name'  => '손기정',
                'hp'    => '01067558897',
                'addr1' => '서울 영등포구 국제금융로7길 32',
                'addr2' => '402동 502호',
            ],
            10 => [
                'name'  => '두만식',
                'hp'    => '01093942525',
                'addr1' => '경기 부천시 원미로144번길 51',
                'addr2' => '101동 203호'
            ],
            11 => [
                'name'  => '우백호',
                'hp'    => '01098245698',
                'addr1' => '서울 영등포구 여의대방로43라길 9',
                'addr2' => '702동 802호',
            ],
            12 => [
                'name'  => '박보영',
                'hp'    => '01045892314',
                'addr1' => '서울 영등포구 국제금융로7길 32',
                'addr2' => '402동 502호',
            ],
        ];
    }
}

package main; 

import (
	"fmt"
	"math/rand"
	"sort"
	"time"
)

func main() {
	UserCnt := 2000000
	var r [][]int

	t := time.Now().UnixNano() / int64(time.Millisecond)

	for i := 0; i < 20; i++ {
		r = append(r, CreateRandArray(UserCnt))
	}

	fmt.Println(len(r[0]))
	t = time.Now().UnixNano()/int64(time.Millisecond) - t
	fmt.Printf("%dms in create List", t)

	t = time.Now().UnixNano() / int64(time.Millisecond)

	rsl := r[0]
	for i := 1; i < 20; i++ {
		rsl = ArrayIntersect2(rsl, r[i])
	}
	t = time.Now().UnixNano()/int64(time.Millisecond) - t
	fmt.Println("")
	fmt.Printf("%dms in arrayintersect", t)
	fmt.Println("")
	fmt.Printf("%d", len(rsl))

}

func ArrayIntersect2(a1, a2 []int) []int {
	cnt := len(a1)

	r := make([]int, cnt)
	k := 0
	j2 := 0
	for i := 0; i < len(a1); i++ {
		for j := j2; j < len(a2); j++ {
			if a1[i] < a2[j] {
				break
			}
			j2++
			if a1[i] == a2[j] {
				// find
				r[k] = i
				k++
				break
			}
		}
	}
	return r[0:k]
}

func ArrayIntersect(a1, a2 []int) []int {
	cnt := len(a1)

	r := make([]int, cnt)
	k := 0
	for i := 0; i < len(a1); i++ {
		idx := sort.SearchInts(a2, a1[i])
		if a2[idx] == a1[i] {
			// find
			r[k] = i
			k++
		}
	}
	return r[0:k]
}

func CreateRandArray(cnt int) []int {

	r := make([]int, cnt)
	j := 0
	for i := 1; i < cnt; i++ {
		if rand.Intn(100) >= 20 {
			r[j] = i
			j++
		}
	}
	return r[0:j]
}


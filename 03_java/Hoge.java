import java.io.BufferedReader;
import java.io.IOException;
import java.io.InputStreamReader;
import java.util.ArrayList;
import java.util.Collection;
import java.util.HashMap;
import java.util.HashSet;
import java.util.List;
import java.util.Random;
import java.util.TreeSet;

public class Hoge {

	static final int USER_CNT = 1000000;

	public static void main(String[] args) {
		// TODO Auto-generated method stub


		List<Collection<Integer>> r = new ArrayList<>();
		long t = System.currentTimeMillis();
		for (int i = 0; i < 20; i++) {
			r.add(getRandArray(Hoge.USER_CNT, 80, i));
			System.out.println(r.get(i).size());
		}
		System.out.println("get list:" + (System.currentTimeMillis() - t) + "msec");

		int i = 0;
		t = System.currentTimeMillis();
		Collection<Integer> rsl = r.get(0);
		r.remove(0);
		for (Collection<Integer> c : r) {
			rsl.retainAll(c);
		}
		System.out.println("get list:" + (System.currentTimeMillis() - t) + "msec");
		System.out.println("count:" + rsl.size());

	}

	public static Collection<Integer> getRandArray(int cnt, int rate, int seed) {

		Collection<Integer> ret = new HashSet<Integer>(1000000);
		// Collection<Integer> arr = new ArrayList<Integer>(1000000);

		Random r = new Random();

		for (int i = 1; i < cnt; i++) {
			if (r.nextInt(100) >= (100 - rate)) {
				ret.add(i);
			}
		}
		return ret;
		// return arr;
		// return new HashSet(arr);
	}
}

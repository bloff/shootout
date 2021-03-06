#!/usr/bin/parrot -j
#
# nsievebits N  (N = 9 for shootout)
# by Leopold Toetsch

# set bits - this might be cheating see nsievebits for resetting bits

.sub primes_in_range
    .param int M
    .local pmc flags
    .local int i, prim, count
    flags = new FixedBooleanArray
    flags = M
    i = 2
    count = 0
lp1:
     $I0 = flags[i]
     if $I0 goto not_p
     .local int j
     j = i + i
     if j >= M goto done
lp2:
     flags[j] = 1
     j += i
     if j < M goto lp2
done:
     inc count
not_p:
     inc i
     if i < M goto lp1
    .return (count)
.end
.sub main :main
    .param pmc argv
    $S0 = argv[1]
    .local int i, j, N, M, count
    N = $S0
    null i
    null j
loop:
    $I0 = N - j
    inc j
    $I1 = 1 << $I0
    M = $I1 * 10000
    count = primes_in_range(M)
    $P0 = new .FixedIntegerArray
    $P0 = 2
    $P0[0] = M
    $P0[1] = count
    $S0 = sprintf "Primes up to %8u %8u\n", $P0
    print $S0
    inc i
    if i < 3 goto loop
.end
    

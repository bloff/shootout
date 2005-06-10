#!/usr/bin/ruby
# The Great Computer Language Shootout
# http://shootout.alioth.debian.org
#
# Ported by Michael Neumann from the C gcc version, which was written by
# Christoph Bauer.

SOLAR_MASS = 4 * Math::PI**2
DAYS_PER_YEAR = 365.24

Planet = Struct.new(:x, :y, :z, :vx, :vy, :vz, :mass)

def advance(bodies, dt)
  nbodies = bodies.size
  for i in 0 ... nbodies
    b = bodies[i]
    for j in (i+1) ... nbodies
      b2 = bodies[j]
      dx = b.x - b2.x
      dy = b.y - b2.y
      dz = b.z - b2.z
      distance = Math.sqrt(dx * dx + dy * dy + dz * dz)
      mag = dt / (distance * distance * distance)
      b_mass_mag, b2_mass_mag = b.mass * mag, b2.mass * mag
      b.vx -= dx * b2_mass_mag
      b.vy -= dy * b2_mass_mag
      b.vz -= dz * b2_mass_mag
      b2.vx += dx * b_mass_mag
      b2.vy += dy * b_mass_mag
      b2.vz += dz * b_mass_mag
    end
  end
  for b in bodies
    b.x += dt * b.vx
    b.y += dt * b.vy
    b.z += dt * b.vz
  end
end

def energy(bodies)
  e = 0.0
  nbodies = bodies.size
  for i in 0 ... nbodies
    b = bodies[i]
    e += 0.5 * b.mass * (b.vx * b.vx + b.vy * b.vy + b.vz * b.vz)
    for j in (i+1) ... nbodies
      b2 = bodies[j]
      dx = b.x - b2.x
      dy = b.y - b2.y
      dz = b.z - b2.z
      distance = Math.sqrt(dx * dx + dy * dy + dz * dz)
      e -= (b.mass * b2.mass) / distance
    end
  end
  return e
end

def offset_momentum(bodies)
  px, py, pz = 0.0, 0.0, 0.0

  for b in bodies
    m = b.mass
    px += b.vx * m
    py += b.vy * m
    pz += b.vz * m
  end

  b = bodies[0]
  b.vx = - px / SOLAR_MASS
  b.vy = - py / SOLAR_MASS
  b.vz = - pz / SOLAR_MASS
end

BODIES = [
  # sun
  Planet.new(0, 0, 0, 0, 0, 0, SOLAR_MASS),

  # jupiter
  Planet.new(
    4.84143144246472090e+00,
    -1.16032004402742839e+00,
    -1.03622044471123109e-01,
    1.66007664274403694e-03 * DAYS_PER_YEAR,
    7.69901118419740425e-03 * DAYS_PER_YEAR,
    -6.90460016972063023e-05 * DAYS_PER_YEAR,
    9.54791938424326609e-04 * SOLAR_MASS ),

  # saturn
  Planet.new(
    8.34336671824457987e+00,
    4.12479856412430479e+00,
    -4.03523417114321381e-01,
    -2.76742510726862411e-03 * DAYS_PER_YEAR,
    4.99852801234917238e-03 * DAYS_PER_YEAR,
    2.30417297573763929e-05 * DAYS_PER_YEAR,
    2.85885980666130812e-04 * SOLAR_MASS ),

  # uranus
  Planet.new(
    1.28943695621391310e+01,
    -1.51111514016986312e+01,
    -2.23307578892655734e-01,
    2.96460137564761618e-03 * DAYS_PER_YEAR,
    2.37847173959480950e-03 * DAYS_PER_YEAR,
    -2.96589568540237556e-05 * DAYS_PER_YEAR,
    4.36624404335156298e-05 * SOLAR_MASS ),

  # neptune
  Planet.new(
    1.53796971148509165e+01,
    -2.59193146099879641e+01,
    1.79258772950371181e-01,
    2.68067772490389322e-03 * DAYS_PER_YEAR,
    1.62824170038242295e-03 * DAYS_PER_YEAR,
    -9.51592254519715870e-05 * DAYS_PER_YEAR,
    5.15138902046611451e-05 * SOLAR_MASS )
]


n = Integer(ARGV[0])

offset_momentum(BODIES)
puts "%.9f" % energy(BODIES)
n.times { advance(BODIES, 0.01) }
puts "%.9f" % energy(BODIES)


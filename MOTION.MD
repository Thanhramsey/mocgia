# MOTION.md

# Motion Design System

The website should deliver a premium experience comparable to modern corporate brands.

Motion is a core part of UX and MUST NOT be treated as optional.

Avoid excessive or distracting animations.

Animation should feel elegant, smooth and natural.

Preferred Libraries

- GSAP
- GSAP ScrollTrigger
- Lenis
- SplitType
- Swiper
- AOS (only if GSAP is unnecessary)

Never use jQuery animation.

Prefer hardware accelerated transform and opacity animations.

---

# Global Motion Rules

FPS Target

60 FPS

Use only:

transform

opacity

filter (sparingly)

Never animate:

width

height

left

top

margin

Use:

translate3d()

scale()

rotate()

opacity

Every transition uses easing.

Preferred easings

power2.out

power3.out

expo.out

circ.out

Animation duration

Micro interaction

150~250ms

Hover

250~350ms

Section

600~900ms

Hero

900~1400ms

---

# Page Loading

Display loading overlay.

Background

White

Logo

Fade In

Scale

0.9 → 1

Opacity

0 → 1

Duration

900ms

After assets loaded

Fade Out

500ms

Page fades in immediately.

---

# Page Transition

Leaving page

Fade Out

Opacity

1 → 0

Duration

300ms

Entering page

Opacity

0 → 1

Duration

450ms

Avoid white flash.

---

# Smooth Scroll

Use Lenis.

Desktop

Smooth scrolling enabled.

Touch devices

Native scrolling.

Synchronize Lenis with GSAP ScrollTrigger.

---

# Header

Initial

Transparent

Height

96px

When scrolling 80px

Background

rgba(255,255,255,0.92)

Backdrop Blur

18px

Height

72px

Logo

Scale

1

↓

0.92

Navigation

Fade In

Transition

300ms

Shadow

Soft

Only after scrolling.

---

# Navigation

Desktop

Mega Menu

Hover

Dropdown

Opacity

0 → 1

TranslateY

20px → 0

Duration

250ms

Menu items

Stagger

50ms

Mobile

Slide from right

Duration

350ms

Overlay

Fade

---

# Hero Section

Background image

Scale

1.08 → 1

Duration

1400ms

Title

SplitType

Characters

Fade

TranslateY

40px → 0

Stagger

35ms

Subtitle

Fade Up

Delay

300ms

CTA Button

Fade Up

Delay

500ms

Hero Image

Parallax

Scroll speed

0.35

---

# Section Entrance

Every section

Animate only once.

Trigger

Top reaches 80% viewport.

Animation

Opacity

0 → 1

TranslateY

50px → 0

Duration

800ms

Ease

power3.out

Stagger children

100ms

---

# Cards

Hover

TranslateY

0 → -10px

Shadow

Increase softly

Image

Scale

1 → 1.06

Transition

320ms

Buttons

Background transition

Icon

TranslateX

4px

---

# Images

Hover

Scale

1 → 1.05

Overlay

Opacity

0 → 0.18

Duration

500ms

---

# Statistics

Trigger

When visible

Counter

0 → Target

Duration

1600ms

requestAnimationFrame

Each card

Fade Up

Delay

100ms

---

# Gallery

Images

Fade Up

Stagger

80ms

Hover

Zoom

1 → 1.08

Overlay

Fade

Icon

Scale

0.8 → 1

---

# Product Cards

Card

Fade Up

Image

Scale on hover

Category

Fade

Title

Slide Up

Button

Reveal

Stagger

40ms

---

# Swiper

Transition

800ms

Ease

power2.out

Pagination

Animated

Navigation buttons

Scale on hover

Auto Height

Enabled

---

# Testimonials

Fade

Scale

0.98 → 1

Duration

700ms

---

# CTA Banner

Background

Parallax

Text

Fade Up

Button

Scale

0.95 → 1

Delay

300ms

---

# Footer

Fade Up

Columns

Stagger

80ms

Social Icons

Hover

Rotate

6deg

Scale

1.1

---

# Buttons

Hover

TranslateY

-2px

Shadow

Increase

Background

Transition

Duration

250ms

Active

Scale

0.97

---

# Forms

Input Focus

Border Color

Transition

Box Shadow

Soft

Label

Slide Up

Validation

Shake

Only when invalid.

---

# Lazy Loaded Images

Before load

Blur

12px

Opacity

0.4

After load

Blur

0

Opacity

1

Duration

500ms

---

# Accessibility

Respect prefers-reduced-motion.

Disable:

Parallax

Split text

Long animations

Keep fades only.

---

# Performance Rules

Batch ScrollTrigger instances.

Kill unused animations.

Lazy initialize off-screen components.

Use IntersectionObserver where GSAP is unnecessary.

Avoid layout thrashing.

Target Lighthouse Performance > 90.

---

# AI Implementation Rules

Animation is mandatory.

Every section must contain at least one meaningful motion effect.

Prefer GSAP timelines over isolated animations.

Reuse animation utilities.

Never duplicate animation code.

Keep motion consistent across the entire website.

Premium quality only.